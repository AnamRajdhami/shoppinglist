<?php
include('./db_config.php');

$sql="select * from todo_list";
$result=$conn->query($sql);

//$row= $result->fetch_assoc();
//print_r($row);
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Shopping list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
  </head>
  <body>

    <div class="modalBox invisible">
        <div class="modal-content">
        <form action="update.php" method="POST">
        <input type="hidden" name="id" id='editID'>
        <input type="text" class="form-control" name="todo" placeholder="Add to your shopping list">
        <button type="submit" class="btn btn-success mt-3">EDIT</button>
     </form>
        </div>
    
    </div>

    <div class="container p-3">
        <h3 class="text-center">Shopping list</h3><br>
    <form action="save_todo.php" method="POST">
        <input type="text" class="form-control" name="todo" placeholder="Add to your shopping list">
        <button type="submit" class="btn btn-info">Add</button>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Shopping list</th>
      <th scope="col">Action</th>
     
    </tr>
  </thead>
  <tbody>

    <?php
    while($row= $result->fetch_assoc()){ 
    ?>
     <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['title'] ?></td>
      <td><a href="./delete.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-sm">Delete</a>
      <button class="btn btn-primary editBtn">Edit</button></td>
     </tr>

    <?php
    }
    ?>
    
  </tbody>
</table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        const modal = document.querySelector('.modalBox');
        const editBtns = document.querySelectorAll('.editBtn');
        const editID = document.querySelector('#editID');


        console.log(editBtns);
        editBtns.forEach((el) =>{
            el.addEventListener('click',(e)=>{
                e.preventDefault();
            modal.classList.remove('invisible');
            modal.classList.add('visible');
            let id = Number(el.parentElement.parentElement.firstElementChild.textContent);
            editID.value = id;
            console.log(editID.value);
            })
        })
    </script>
  </body>
</html>