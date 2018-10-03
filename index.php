<!doctype html>
<html>
<head>
<title>
    Api to fetch row from database
</title> 
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">
      $("document").ready(function() 
      { 
        $(".form").submit(function() 
        { 
            var data = {"action": "test"};
            data = $(this).serialize() + "&" + $.param(data); 
            $.ajax({ 
                type: "POST",
                dataType: "json", 
                url: "response.php", 
                data: data, 
                success: function(data) 
                { 
                    
                    if(data["flag"]=='1')
                    {
                        alert("Entry not found");
                        $(".the-return").html( 
                    "<br>" + "<br>" +
                    "User ID: " +  "<br>" +"<br>" +
                    "Name: " +  "<br>" +"<br>" +
                    "Phone: " +  "<br>" +"<br>" +
                    "Email: " +  "<br>" +"<br>" +
                    "Employee ID: " +  "<br>" +"<br>"+
                    "Company: " +  "<br>" +"<br>"+
                    "Salary: " +  "<br>" +"<br>"+
                    "Location: " +  "<br>" +"<br>"+
                    "Hometown: " +  "<br>" +"<br>"+
                    "Degree: " +  "<br>" +"<br>"
                    ); 
                    }
                    else
                    {
                        $(".the-return").html( 
                    "<br>" + "<br>" +
                    "User ID: " + data["userid"] + "<br>" +"<br>" +
                    "Name: " + data["name"] + "<br>" +"<br>" +
                    "Phone: " + data["phone"] + "<br>" +"<br>" +
                    "Email: " + data["email"] + "<br>" +"<br>" +
                    "Employee ID: " + data["eid"] + "<br>" +"<br>"+
                    "Company: " + data["company"] + "<br>" +"<br>"+
                    "Salary: " + data["salary"] + "<br>" +"<br>"+
                    "Location: " + data["location"] + "<br>" +"<br>"+
                    "Hometown: " + data["hometown"] + "<br>" +"<br>"+
                    "Degree: " + data["degree"] + "<br>" +"<br>"
                    ); 
                    }
                } 
            }); 
            return false; 
        }); 
    }); 
                    
    </script>                
</head>           

<body>

    <h2>FETCH USER DATA</h2>
    <br>
    <form class="form" method="post" accept-charset="utf-8">

        Name or User id: <input type="text" name="field" value="" placeholder="Enter Email or User ID">
 
        <br><br>
   
        <input type="submit" name="submit" value="Submit form"  />
    </form>


    <div class="the-return">
    <br>
    <br>
    [HTML is replaced when successful.]
    <br>
    <br>
    </div>

</body>
</html>