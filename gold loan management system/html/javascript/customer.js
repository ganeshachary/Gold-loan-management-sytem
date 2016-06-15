<script>
$(document).ready(function(){
    $("button").click(function(){
        $.ajax(
           {
              url: "wrongfile.txt", 
              success: function(result){
                $("#div1").html(result);
              }
               error: function(xhr){
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }});
    });
});
</script>