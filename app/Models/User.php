<?php

namespace App\Models;
use App\Models\Business;
use App\Models\PlanOrder;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\UserEmailTemplate;
class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'avatar',
        'lang',
        'delete_status',
        'plan',
        'plan_expire_date',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function creatorId()
    {
        if($this->type == 'company' || $this->type == 'super admin')
        {
            return $this->id;
        }
        else
        {
            return $this->created_by;
        }
    }
    public function currentLanguage()
    {
        return $this->lang;
    }
    public function countCompany()
    {
        return User::where('type', '=', 'company')->where('created_by', '=', $this->creatorId())->count();
    }
    public function countPaidCompany()
    {
        return User::where('type', '=', 'company')->whereNotIn(
            'plan', [
                      0,
                      1,
                  ]
        )->where('created_by', '=', \Auth::user()->id)->count();
    }
    public function totalBusiness($id)
    {
        return Business::where('created_by', '=', $id)->count();
    }

    public function currentPlan()
    {
        return $this->hasOne('App\Models\Plan', 'id', 'plan');
    }
    // public function totalCompanyCustomer($id)
    // {
    //     return Customer::where('created_by', '=', $id)->count();
    // }
    public function assignPlan($planID)
    {
        $plan = Plan::find($planID);

        if($plan)
        {
            $this->plan = $plan->id;
            $business   = Business::where('created_by', '=', \Auth::user()->id)->get();
            if(strtolower($plan->duration) == 'month')
            {
                $this->plan_expire_date = Carbon::now()->addMonths(1)->isoFormat('YYYY-MM-DD');
            }
            elseif(strtolower($plan->duration) == 'year')
            {
                $this->plan_expire_date = Carbon::now()->addYears(1)->isoFormat('YYYY-MM-DD');
            }
            else if($plan->duration == 'Unlimited')
            {
                $this->plan_expire_date = null;
            }
            // else{
            //     $this->plan_expire_date = null;
            // }


            if($plan->business == -1)
            {
                foreach($business as $b)
                {
                    $b->status = 'active';
                    $b->save();
                }
            }
            else
            {
                $businessCount = 0;
                foreach($business as $b)
                {
                    $businessCount++;
                    if($businessCount <= $plan->business)
                    {
                        $b->status = 'active';;
                        $b->save();
                    }
                    else
                    {
                        $b->status = 'lock';
                        $b->save();
                    }
                }
            }
            $this->save();
            return ['is_success' => true];
        }
        else
        {
            return [
                'is_success' => false,
                'error' => 'Plan is deleted.',
            ];
        }
    }
    public function planPrice()
    {
        $user = \Auth::user();
        if($user->type == 'super admin')
        {
            $userId = $user->id;
        }
        else
        {
            $userId = $user->created_by;
        }

        return \DB::table('settings')->where('created_by', '=', $userId)->get()->pluck('value', 'name');

    }
    public function dateFormat($date)
    {

        return date('d-m-Y',strtotime($date));
    }
    public function getPlanThemes(){
        $plan = Plan::find($this->plan);
        if($plan){
            $themes = $plan->themes;
            if(!empty($themes)){
               return explode(',',$themes);
            }else{
                return [];
            }
        }else{
            return [];
        }
    }
    public function getTotalAppoinments(){
        return Appointment_deatail::where('business_id',$this->id)->count();
    }

    public function getMaxBusiness(){
        $plan = Plan::find($this->plan);
        if($plan){
            return $plan->business;
        }else{
            return 0;
        }
    }

      public static function defaultEmail()
    {
        // Email Template
        $emailTemplate = [
            'Appointment Created',
            'User Created',

        ];

        foreach($emailTemplate as $eTemp)
        {
            EmailTemplate::create(
                [
                    'name' => $eTemp,
                    'from' => env('APP_NAME'),
                    'created_by' => 1,
                ]
            );
        }

        $defaultTemplate = [
            'Appointment Created' => [
                'subject' => 'Appointment Created',
                'lang' => [
                    'ar' => '<p>مرحبا عزيزتي</p><p>قام {appointment_name} بحجز تعيين ل ـ {appointment_date} في{appointment_time}.</p><p>البريد الالكتروني : {appointment_email}</p><p>رقم التليفون : {appointment_phone}</p><p>يعتبر،</p><p>{app_url}</p>',
                    'da' => '<p>Hej, kære.</p><p>{ appointment_name } har bestilt en aftale for { appointment_date} kl. {appointment_time}.</p><p>E-mail: { appointment_email }</p><p>Telefonnummer: { appointment_phone }</p><p>Med venlig hilsen</p><p>{ app_name }.</p>',
                    'de' => '<p>Hallo Lieber,</p><p>{appointment_name} hat einen Termin für {appointment_date} gebucht um {appointment_time}.</p><p>E-Mail: {appointment_email}</p><p>Telefonnummer: {appointment_phone}</p><p>Betrachtet,</p><p>{app_name}.</p>',
                    'en' => '<p>Hi Dear,</p><p>{appointment_name} has booked an appointment for {appointment_date} at {appointment_time}.</p><p>Email: {appointment_email}</p><p>Phone Number: {appointment_phone}</p><p>Regards,</p><p>{app_name}.</p>',
                    'es' => '<p>Hola Querido,</p><p>{appointment_name} ha reservado una cita para {appointment_date}a las {appointment_time}.</p><p>Correo electrónico: {appointment_email}</p><p>Número de teléfono: {appointment_phone}</p><p>Considerando,</p><p>{app_name}.</p>',
                    'fr' => '<p>Salut, Chère,</p><p>{ appointment_name} a réservé un rendez-vous pour { appointment_date } à {appointment_time}.</p><p>Adresse électronique: {appointment_email}</p><p>Numéro de téléphone: { appointment_phone }</p><p>Regards,</p><p>{ app_name }.</p>',
                    'it' => '<p>Ciao Caro,</p><p>{appointment_name} ha prenotato un appuntamento per {appointment_date} a {appointment_time}.</p><p>Email: {appointment_email}</p><p>Numero di telefono: {appointment_phone}</p><p>Riguardo,</p><p>{app_name}.</p>',
                    'ja' => '<p>こんにちは、</p><p>{appointment_name} は {appointment_date} の {appointment_time} に予約を入れました。</p><p>メール: {appointment_email}</p><p>電話番号: {appointment_phone}</p><p>よろしくお願いします</p><p>{app_name}.</p>',
                    'nl' => '<p>Hallo, lieverd.</p><p>{ appointment_name } heeft een afspraak voor { appointment_date } geboekt Bij {appointment_time}.</p><p>E-mail: { appointment_email }</p><p>Telefoonnummer: { appointment_phone }</p><p>Betreft:</p><p>{ app_name }.</p>',
                    'pl' => '<p>Witam Szanowny Panie,</p><p>Użytkownik {appointment_name } zarezerwował termin dla {appointment_date } W {appointment_time}.</p><p>E-mail: {appointment_email }</p><p>Numer telefonu: {appointment_phone }</p><p>W odniesieniu do</p><p>{app_name }.</p>',
                    'ru' => '<p>Привет, дорогой.</p><p>Пользователь { appointment_name } забронировал назначение на { appointment_date } в {appointment_time}.</p><p>Электронная почта: { appointment_email }</p><p>Номер телефона: { appointment_phone }</p><p>С уважением,</p><p>{ app_name }.</p>',
                    'pt' => '<p>Oi Querida,</p><p>{appointment_name} marcou um compromisso para {appointment_date} no {appointment_time}.</p><p>E-mail: {appointment_email}</p><p>Número do Telefone: {appointment_phone}</p><p>Considera,</p><p>{app_name}.</p>',
                ],
            ],
            'User Created' => [
                'subject' => 'User Created',
                'lang' => [
                    'ar' => '<p><font face="sans-serif">مرحبًا {user_name}</font></p><p><font face="sans-serif">لتسجيل الدخول إلى تفاصيل حسابك ، ما عليك سوى النقر فوق Url أدناه</font></p><p><font face="sans-serif">اسم المستخدم: {user_email}</font></p><p><font face="sans-serif">كلمة المرور: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">شكرًا لك على الانضمام إلى فريقنا كـ {user_type}</font></p>',
                    'da' => '<p><font face="sans-serif">Hej {user_name}</font></p><p><font face="sans-serif">For at logge på dine kontooplysninger skal du blot klikke på URL nedenfor</font></p><p><font face="sans-serif">brugernavn: {user_email}</font></p><p><font face="sans-serif">adgangskode: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Tak, fordi du sluttede dig til vores team som en {user_type}</font></p>',
                    'de' => '<p><font face="sans-serif">Hallo, {user_name}</font></p><p><font face="sans-serif">Um sich mit Ihren Kontodaten anzumelden, klicken Sie einfach unten auf die URL</font></p><p><font face="sans-serif">Benutzername: {user_email}</font></p><p><font face="sans-serif">Passwort: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Vielen Dank, dass Sie unserem Team als {user_type} beigetreten sind</font></p>',
                    'en' => '<p><font face="sans-serif">Hi {user_name}</font></p><p><font face="sans-serif">To login to your account details simply click on Url Below</font></p><p><font face="sans-serif">Username: {user_email}</font></p><p><font face="sans-serif">word Pass: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif"> Thank you for joining our team as {user_type}</font></p>',
                    'es' => '<p><font face="sans-serif">Hola, {nombre_de_usuario}</font></p><p><font face="sans-serif">Para iniciar sesión en los detalles de su cuenta, simplemente haga clic en Url a continuación</font></p><p><font face="sans-serif">nombre de usuario: {user_email}</font></p><p><font face="sans-serif">contraseña: {usuario_contraseña}</font></p><p><font face="sans-serif">{aplicación_url}</font></p><p><font face="sans-serif">Gracias por unirte a nuestro equipo como {user_type}</font></p>',
                    'fr' => '<p><font face="sans-serif">Bonjour, {user_name}</font></p><p><font face="sans-serif">Pour vous connecter aux détails de votre compte, cliquez simplement sur Url ci-dessous</font></p><p><font face="sans-serif">nom d\'utilisateur : {user_email}</font></p><p><font face="sans-serif">mot de passe : {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Merci d\'avoir rejoint notre équipe en tant que {user_type}</font></p>',
                    'it' => '<p><font face="sans-serif">Ciao, {nome_utente}</font></p><p><font face="sans-serif">Per accedere ai dettagli del tuo account, fai semplicemente clic sull\'URL qui sotto</font></p><p><font face="sans-serif">nome utente: {utente_email}</font></p><p><font face="sans-serif">password: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Grazie per esserti unito al nostro team come {user_type}</font></p>',
                    'ja' => '<p><font face="sans-serif">こんにちは、{user_name}</font></p><p><font face="sans-serif">アカウントの詳細にログインするには、下のURLをクリックしてください。</font></p><p><font face="sans-serif">ユーザー名：{user_email}</font></p><p><font face="sans-serif">パスワード：{user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">{user_type}として私たちのチームに参加していただきありがとうございます</font></p>',
                    'nl' => '<p><font face="sans-serif">Hallo, {user_name}</font></p><p><font face="sans-serif">Om in te loggen op uw accountgegevens, klikt u op onderstaande URL</font></p><p><font face="sans-serif">gebruikersnaam: {user_email}</font></p><p><font face="sans-serif">wachtwoord: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Bedankt dat je lid bent geworden van ons team als {user_type}</font></p>',
                    'pl' => '<p><font face="sans-serif">Cześć, {nazwa_użytkownika}</font></p><p><font face="sans-serif">Aby zalogować się na swoje konto, po prostu kliknij poniższy adres URL</font></p><p><font face="sans-serif">nazwa użytkownika: {user_email}</font></p><p><font face="sans-serif">hasło: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Dziękujemy za dołączenie do naszego zespołu jako {user_type}</font></p>',
                    'ru' => '<p><font face="sans-serif">Привет, {имя_пользователя}</font></p><p><font face="sans-serif">Чтобы войти в свою учетную запись, просто нажмите URL-адрес ниже</font></p><p><font face="sans-serif">имя пользователя: {user_email}</font></p><p><font face="sans-serif">пароль: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Спасибо, что присоединились к нашей команде как {user_type}</font></p>',
                    'pt' => '<p><font face="sans-serif">Olá, {user_name}</font></p><p><font face="sans-serif">Para acessar os detalhes da sua conta, basta clicar no URL abaixo</font></p><p><font face="sans-serif">nome de usuário: {user_email}</font></p><p><font face="sans-serif">senha: {user_password}</font></p><p><font face="sans-serif">{app_url}</font></p><p><font face="sans-serif">Obrigado por se juntar à nossa equipa como {user_type}</font></p>',
                ],
            ],
        ];

        $email = EmailTemplate::all();

        foreach($email as $e)
        {
            foreach($defaultTemplate[$e->name]['lang'] as $lang => $content)
            {
                EmailTemplateLang::create(
                    [
                        'parent_id' => $e->id,
                        'lang' => $lang,
                        'subject' => $defaultTemplate[$e->name]['subject'],
                        'content' => $content,
                    ]
                );
            }
        }

        $allEmail = EmailTemplate::all();
        foreach($allEmail as $email)
        {
            UserEmailTemplate::create(
                [
                    'template_id' => $email->id,
                    'user_id' => 1,
                    'is_active' => 1,
                ]
            );
        }

    }

}
