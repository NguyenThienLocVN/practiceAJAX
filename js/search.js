$(document).ready(function(){

    // Function to load data
    load_data();

    function load_data(query)
    {
    $.ajax({
      url:"result.php",
      method:"POST",
      data:{query:query},
      success:function(data)
      {
        $("#result").html('');
        console.log(data);
        var parse = JSON.parse(data);
        console.log(parse);

        for(var i=0;i<parse.length;i++)
        {
          $("#result").append(
              "<tr>"+
                "<th>"+parse[i]['id']+"</th>"+
                "<th>"+parse[i]['city']+"</th>"+
              "</tr>"
          );
        }
        
        
      }
    });
    }

    // Call function when type
    $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();
    }
    });
});