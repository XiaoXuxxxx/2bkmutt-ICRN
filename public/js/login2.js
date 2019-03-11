var apiLead = APP_URL + "/login";
var working = false;
$('#login2').on('submit', function(e) {
  e.preventDefault();
  if (working) return;
  working = true;

 $.ajax({
        method: "POST",
        url: apiLead,
        data: {
                email: $("#email").val(),
                password: $("#password").val()
        }
        }).done(function(data) {

  var $this = $(this),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Authenticating');
  setTimeout(function() {
    $this.addClass('ok');
    $state.html('Welcome back!');

},3000);
});
});

