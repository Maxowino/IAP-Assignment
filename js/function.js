$(document).ready(function(){
    load_data();

    function load_data(query){
        $.ajax(
            {
                url:'process_data.php',
                method:'POST',
                data:{query:query},
                success:function(data){

                    $('#out_put').html(data);
                }
            }
        );
    }
    $('#in_put').keyup(
        function()
    {
        

    })

})