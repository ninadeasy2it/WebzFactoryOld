<?php
    // $logo_img=\App\Models\Utility::getValByName('logo'); 
    $company_logo = \App\Models\Utility::GetLogo();
    $logo=\App\Models\Utility::get_file('uploads/logo/');
?>
<style>
    .qrcode canvas {
    width: 100%;
    height: 100%;
    padding: 12px 25px;
}
</style>
<div class="logo-content modal-body-section text-center">
    
    <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png')); ?>"
    alt="<?php echo e(config('app.name', 'AccountGo')); ?>" class="logo logo-lg">
</div>
<div class="modal-body border-0">
    <div class="modal-body-section text-center">
        <div class="qr-main-image">
            <div class="qr-code-border">
                <img src="<?php echo e(asset('custom/img/left-top.svg')); ?>" alt="left-top" class="img-fluid left-top-border">
                <img src="<?php echo e(asset('custom/img/left-bottom.svg')); ?>" alt="left-bottom" class="img-fluid left-bottom-border">
                <img src="<?php echo e(asset('custom/img/right-top.svg')); ?>" alt="right-top" class="img-fluid right-top-border">
                <img src="<?php echo e(asset('custom/img/right-bottom.svg')); ?>" alt="right-bottom" class="img-fluid right-bottom-border">
                <div class="qrcode mt-3 "></div>
            </div>
        </div>
        <div class="text">
            <p class="text-black">
                <?php echo e(__('Point your camera at the QR code, or visit')); ?><br> <span class="qr-link text-center mr-2"></span>
            </p>
        </div>
    </div>
</div>
<script> 
    // $("#download-qr").load(function(){ 
    //     // alert("hey");
    //     var qrcode = '<?php echo e($business->slug); ?>';  
    //     $(".qrcode").children("canvas").addClass( "data");
    //     this.href = $('.data')[0].toDataURL();
    //     this.download = '<?php echo e($business->slug); ?>';
    // });
    $( document ).ready(function() {
        // dd(url_link);
        var slug = '<?php echo e($qrData); ?>';
        var url_link = `<?php echo e(url("/")); ?>/${slug}`;
        console.log(url_link);
        $(`.qr-link`).text(url_link);
        $('.qrcode').qrcode(url_link); 
    }); 
</script>
<?php /**PATH C:\wamp64\www\WebzFactoryOld\resources\views/business/businessQR.blade.php ENDPATH**/ ?>