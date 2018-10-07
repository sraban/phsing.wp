$(document).ready(function(){

$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
      if( $this.val() === '' ) {
        label.removeClass('active highlight'); 
      } else {
        label.removeClass('highlight');   
      }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
        label.removeClass('highlight'); 
      } 
      else if( $this.val() !== '' ) {
        label.addClass('highlight');
      }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});


      $("#login_form").submit(function(e) {
          e.preventDefault();
          $.ajax({
              type:'post',
              data:$("#login_form").serialize() ,
              url:'../api/login.php',
              dataType : 'json',
              success:function(data) {
                  if(data.token){
                    document.cookie="tokenVal="+ data.token; /// you can set returned token in cookie or session and 
                    window.location = "dashboard.html";
                  }
                }
            });
     });


      $("#signup_form").submit(function(e) {
        e.preventDefault();
          $.ajax({
              type:'post',
              data:$("#signup_form").serialize() ,
              url:'../api/register.php',
              dataType : 'json',
              success:function(data) {
                  if(data.token){
                    document.cookie="tokenVal="+ data.token; /// you can set returned token in cookie or session and 
                    window.location = "dashboard.html";
                  }else{
                    alert("User Already Exists");
                  }
              }
          });
     });

      function getCookie(name)
      {
        var re = new RegExp(name + "=([^;]+)");
        var value = re.exec(document.cookie);
        return (value != null) ? unescape(value[1]) : null;
      }    
      $.ajax({
          type:'post',
          data:{'token': getCookie("tokenVal") } ,
          url:'../api/retoken.php',
          dataType : 'json',
          success:function(data) {
              if(data.token){
                document.cookie="tokenVal="+ data.token;
                window.location = "dashboard.html";
              }
          }
      });

  });