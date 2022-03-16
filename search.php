<!DOCTYPE html>
<html>
<head>
   <title>Live Search using AJAX</title>
   <!-- Including jQuery is required. -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script src="https://use.fontawesome.com/fecf5a07d6.js"></script>
        <style>
        #color {
            width:400px;
            height:100px;
            display:flex;
            list-style: none;
        }
        #color li {
            opacity: 0.5;
            width:70px;
            height:70px;
            margin-left:10px;
            padding:10px;
        }
        .active {
            border: 2px solid red;
        }
    </style>
    
    </head>
<body>
        <ul id="color">
       <li class="active" data-color="red" style="background:red;"></li>
        <li data-color="blue" style="background:blue;"></li>
       <li data-color="green" style="background:green;"></li>

       </ul>
            <div class='form_show'>
            <span id="close_btn">×</span>
                <form id="inOverlay" method="get" action="blog-search.php" class="d-flex flex-row">
<!--              <input class="form-control me-2" type="text" id="searchInput" placeholder="Search" >-->
   <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">

          <button class="btn btn-info" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
</button>
        </form>
        </div>


<!-- Search box. -->
   <br>
   <b>Ex: </b><i>David, Ricky, Ronaldo, Messi, Watson, Robot</i>
   <br>
   <!-- Suggestions will be displayed in below div. -->
   <div id="display">
<ul>
    
    </ul> 
    
    </div>
       <button type="button" ><i class="fa-solid fa-angle-up"></i>up</button>

   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script >
        let lis = document.querySelectorAll('#color li');
        let display = document.getElementById('display');
        if(window.localStorage.color) {
            display.style.backgroundColor = window.localStorage.color;
                    lis.forEach(li => {
                        li.classList.remove('active');
                    });
            document.querySelector(`[data-color="${window.localStorage.color}"]`).classList.add('active');
        }
        lis.forEach(li => {
            li.onclick = (e) => {
            lis.forEach(li => {
            li.classList.remove('active');
                    });
            e.currentTarget.classList.add('active');
            window.localStorage.color = e.currentTarget.dataset.color;
            display.style.backgroundColor = window.localStorage.color;
            }
        })
$(document).ready(function() {
    function fill(Value) {
   //Assigning value to "search" div in "search.php" file.
   $('#search').val(Value);
   //Hiding "display" div in "search.php" file.
   $('#display').hide();
}
   //On pressing a key on "Search box" in "search.php" file. This function will be called.
   $("#search").keyup(function() {
       //Assigning search box value to javascript variable named as "name".
       let name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           //Assigning empty value to "display" div in "search.php" file.
           $("#display").html("");
       } else {
           //AJAX is called.
           $.ajax({
               //AJAX type is "Post".
               url: "ajax.php",
               type: "POST",
               //Data, that will be sent to "ajax.php".
               data: {
                   //Assigning value of "name" into "search" variable.
                   search: name
               },
               //If result found, this funtion will be called.
               success: function(data) {
                   //Assigning result to "display" div in "search.php" file.
                   $("#display").html(data);
               }
           });
       }
   });
});
    </script>
    <script>
                let searchOverlay = document.querySelector('.form_show');
                    let closeBtn = document.getElementById('close_btn');
            closeBtn.onclick = function() {
                return searchOverlay.style.display = `none`;
            }
    </script>
</body>
</html>