<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example for Data Class</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    
</head>
<body>
      <h1>My Restaurant</h1>
        <div id="main">
            
                <h2>Menu Items</h2>
                
                    <select id="dropdown">
                        
                    </select>
            
                <br>
                <div class="col-12 col-md-2" >
                    
                    <button type="submit" id="submitbtn" class="btn btn-success">
                        Submit
                    </button>
                </div>
                
            
                </div>
      
        <br><br>
    
       <div>
            <table id="myTable">
                <tbody id="eachRow">
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>           
                </tbody>
            </table>
        </div>
    <!-- <script src="jquery-3.5.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
     
    
 
    let base_url = "http://localhost/assign4PHP/restaurant.php";
  
        $("document").ready(function(){
            getMenuList();
            getItemById();
            $.get(base_url,function(data,success){
                console.log(data);
            });
        });
        function getMenuList() {
            let url = base_url + "?req=name_list";
            $.get(url,function(data,success){
                console.log(data.length);
                console.log(data);
                 for (const item in data) {
                let itemName = data[item].name;
                let eachItem=document.createElement("option");
                eachItem.textContent=itemName;
                eachItem.value=item;
                document.querySelector('#dropdown').appendChild(eachItem);
    
                }
            let submitbtn = document.querySelector("#submitbtn");
            submitbtn.addEventListener('click',addItem);
            function addItem() {
        
        document.querySelector('#eachRow').innerHTML="";
        let item=document.querySelector('#dropdown').value;
        let list=data[item];
        for (i in list) {
            let tr=document.createElement("tr");
            let th=document.createElement("th");
            th.textContent=i;
            tr.appendChild(th);
            let td=document.createElement("td");
            td.textContent=list[i];
            
            tr.appendChild(td);
            document.querySelector('#eachRow').appendChild(tr);
        }
    }
            });
        }
        
        function getItemById() {
            let id = 877;
            let url = base_url + "?req=restaurant_data&id="+id;
            $.get(url,function(data,success){
                console.log(data.length);
                console.log(data);
            });
        }
    </script>
    
    </body>
</html>