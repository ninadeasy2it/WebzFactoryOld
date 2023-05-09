

<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/js/pages/wow.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/dash.js') }}"></script>
<script src="{{asset('custom/libs/summernote/summernote-bs4.js')}}"></script>
<script src="{{ asset('custom/libs/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
{{-- FullCalendar --}}
<script src="{{ asset('assets/js/plugins/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/main.min.js') }}"></script>

<!-- sweet alert Js -->
<script src="{{ asset('assets/js/plugins/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/ac-alert.js') }}"></script>
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
{{-- DataTable --}}
<script src="{{ asset('custom/js/emojionearea.min.js')}}"></script>
<script src="{{ asset('assets/js/plugins/simple-datatables.js')}}"></script>

<script src="{{ asset('custom/js/summernote-ext-emoji.js')}}"></script>
 <script src="{{ asset('assets/js/plugins/bootstrap-switch-button.min.js') }}"></script>
 
 <script src="{{ asset('custom/libs/select2/dist/js/select2.full.min.js')}}"></script>
 
 

<script>
    const dataTable = new simpleDatatables.DataTable("#pc-dt-simple");
</script>
<script src="{{ asset('custom/js/custom.js')}}"></script>
{{-- MODAL --}}
 @stack('custom-scripts')

<script>
  feather.replace();
  var pctoggle = document.querySelector("#pct-toggler");
  if (pctoggle) {
    pctoggle.addEventListener("click", function () {
      if (
        !document.querySelector(".pct-customizer").classList.contains("active")
      ) {
        document.querySelector(".pct-customizer").classList.add("active");
      } else {
        document.querySelector(".pct-customizer").classList.remove("active");
      }
    });
  }

  var themescolors = document.querySelectorAll(".themes-color > a");
  for (var h = 0; h < themescolors.length; h++) {
    var c = themescolors[h];

    c.addEventListener("click", function (event) {
      var targetElement = event.target;
      if (targetElement.tagName == "SPAN") {
        targetElement = targetElement.parentNode;
      }
      var temp = targetElement.getAttribute("data-value");
      removeClassByPrefix(document.querySelector("body"), "theme-");
      document.querySelector("body").classList.add(temp);
    });
  }

  var custthemebg = document.querySelector("#cust-theme-bg")!== null;
  
  if(custthemebg){
      
      var custthemebg = document.querySelector("#cust-theme-bg");
      
  custthemebg.addEventListener("click", function () {
    if (custthemebg.checked) {
      document.querySelector(".dash-sidebar").classList.add("transprent-bg");
      document
        .querySelector(".dash-header:not(.dash-mob-header)")
        .classList.add("transprent-bg");
    } else {
      document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
      document
        .querySelector(".dash-header:not(.dash-mob-header)")
        .classList.remove("transprent-bg");
    }
  });
  
  }
  
  
  function removeClassByPrefix(node, prefix) {
    for (let i = 0; i < node.classList.length; i++) {
      let value = node.classList[i];
      if (value.startsWith(prefix)) {
        node.classList.remove(value);
      }
    }
  }
</script>



@if(Utility::getValByName('gdpr_cookie') == 'on')
    <script type="text/javascript">

        var defaults = {
            'messageLocales': {
                /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
                'en': "{{Utility::getValByName('cookie_text')}}"
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'cookieNoticePosition': 'bottom',
            'learnMoreLinkEnabled': false,
            'learnMoreLinkHref': '/cookie-banner-information.html',
            'learnMoreLinkText': {
                'it': 'Saperne di più',
                'en': 'Learn more',
                'de': 'Mehr erfahren',
                'fr': 'En savoir plus'
            },
            'buttonLocales': {
                'en': 'Ok'
            },
            'expiresIn': 30,
            'buttonBgColor': '#d35400',
            'buttonTextColor': '#fff',
            'noticeBgColor': '#000',
            'noticeTextColor': '#fff',
            'linkColor': '#009fdd'
        };
    </script>
    <script src="{{ asset('custom/js/cookie.notice.js')}}"></script>
@endif




<script>

    function toastrs(title, message, type) {
    var o, i;
    var icon = '';
    var cls = '';
    if (type == 'success') {
        icon = 'fas fa-check-circle';
        // cls = 'success';
        cls = 'primary';
    } else {
        icon = 'fas fa-times-circle';
        cls = 'danger';
    }

    console.log(type,cls);
    $.notify({ icon: icon, title: " " + title, message: message, url: "" }, {
        element: "body",
        type: cls,
        allow_dismiss: !0,
        placement: {
            from: 'top',
            align: 'right'
        },
        offset: { x: 15, y: 15 },
        spacing: 10,
        z_index: 1080,
        delay: 2500,
        timer: 2000,
        url_target: "_blank",
        mouse_over: !1,
        animate: { enter: o, exit: i },
        // danger
        template: '<div class="toast text-white bg-'+cls+' fade show" role="alert" aria-live="assertive" aria-atomic="true">'
                +'<div class="d-flex">'
                    +'<div class="toast-body"> '+message+' </div>'
                    +'<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>'
                +'</div>'
            +'</div>'
        // template: '<div class="alert alert-{0} alert-icon alert-group alert-notify" data-notify="container" role="alert"><div class="alert-group-prepend alert-content"><span class="alert-group-icon"><i data-notify="icon"></i></span></div><div class="alert-content"><strong data-notify="title">{1}</strong><div data-notify="message">{2}</div></div><button type="button" class="close" data-notify="dismiss" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'
    });
}
</script>

<!-- <script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure?`,
              text: "This action can not be undone. Do you want to continue?",
              icon: "warning",
              buttons: ["No", "Yes"],
              dangerMode: true,
              confirmButtonText: 'Yes',
              cancelButtonText: 'No',
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

     
  
</script> -->
<!-- <script type="text/javascript">
        $(document).ready(function() {
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })
                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "This action can not be undone. Do you want to continue?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            });
        });
    </script> -->

  