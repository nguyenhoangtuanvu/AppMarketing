<?php include "connect_db.php"; ?>
<style>
  .edit{
      width: 100%;
      height: 25px;
  }
  .editMode{
      border: 1px solid black;
  }
  table {
      border:3px solid lavender;
      border-radius:3px;
  }
  table tr:nth-child(1){
      background-color:dodgerblue;
  }
  table tr:nth-child(1) th{
      color:white;
      padding:10px 0px;
      letter-spacing: 1px;
  }
  table td{
      padding:10px;
  }
  table tr:nth-child(even){
      background-color:lavender;
      color:black;
  }
</style>
  <div class='container'>
    <table width='100%' border='0'>
      <tr>
        <th width='10%'>ID</th>
        <th width='40%'>Username</th>
        <th width='40%'>Name</th>
      </tr>
      <?php 
        $query = "select * from contact";
        $result = mysqli_query($con,$query);
        $count = 1;
        while($row = mysqli_fetch_array($result) ){
          $id = $row['id'];
          $username = $row['email'];
          $name = $row['name'];
       ?>
          <tr>
            <td><?php echo $count; ?></td>
            <td> 
               <div contentEditable='true' class='edit' id='username_<?php echo $id; ?>'> 
                 <?php echo $username; ?>
               </div> 
            </td>
            <td> 
               <div contentEditable='true' class='edit' id='name_<?php echo $id; ?>'>
                 <?php echo $name; ?> 
               </div> 
            </td>
         </tr>
      <?php
         $count ++;
        }
      ?> 
    </table>
 </div>

 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
    $(".edit").focus(function(){
      var id = this.id;
      var split_id = id.split("_");
      var field_name = split_id[0];
      var edit_id = split_id[1];
      var value = $(this).text();
      console.log(edit_id);

      $.ajax({
         url: 'update.php',
         type: 'post',
         data: { field:field_name, value:value, id:edit_id },
         success:function(response){
            console.log('Save successfully');
         }
       });

    });
  });
</script>

<html>
    <head>
        <title>Send Mail</title>
    </head>
    <body>
        <form method="POST" action="?action=send&id=<?= $_GET['id'] ?>">
            <select name="groups" class="send-form__select">
                <?php while($row = mysqli_fetch_array($query_groups)) { ?>
                <option value="<?= $row['group_id'] ?>"><?= $row['group_name'] ?></option>
                <?php } ?>
            </select>
            <button type="submit" name="sendmail">sendmail</button>
        </form>
    </body>
</html>

box-sizing: border-box;display: inline-block;font-family:"Cabin",sans-serif;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #ff6600; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;