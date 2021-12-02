
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

// $('#addForm').submit(function(){
//   alert("RADIS");
//   event.preventDefault();
//   console.log("Adding new repair");
//   const $form =$(this);
//   const $input = $form.find('input, select, button, textarea');

//   const serijalizacija = $form.serialize();
//   console.log(serijalizacija);

//   $input.prop('disabled', true);

//   req = $.ajax({
//       url: 'handler/addRepair.php',
//       type:'post',
//       data: serijalizacija
//   });

//   req.done(function(res, textStatus, jqXHR){
//       if(res=="Success"){
//           alert("Repair add");
//           location.reload(true);
//       }else console.log("Repair is NOT added!!! "+res);
//       console.log(res);
//   });

//   req.fail(function(jqXHR, textStatus, errorThrown){
//       console.error('Error occured '+textStatus, errorThrown)
//   });
// });

function onSubmit(){

  event.preventDefault();
  console.log("Adding new repair");
  const $form =$('#addForm');
  const $input = $form.find('input, select, button, textarea');

  const serijalizacija = $form.serialize();
  console.log(serijalizacija);

  $input.prop('disabled', true);

  req = $.ajax({
      url: 'handler/addRepair.php',
      type:'post',
      data: serijalizacija
  });

  req.done(function(res, textStatus, jqXHR){
      if(res=="Success"){
          
          location.reload(true);
      }else console.log("Repair is NOT added!!! "+res);
      console.log(res);
  });

  req.fail(function(jqXHR, textStatus, errorThrown){
      console.error('Error occured '+textStatus, errorThrown)
  });
}

function deleteRow(){

  console.log("Deleting selected repair");

  const checked = $('input[name=checked-donut]:checked');

  req = $.ajax({
      url: 'handler/deleteRepair.php',
      type:'post',
      data: {'id':checked.val()}
  });

  req.done(function(res, textStatus, jqXHR){
      if(res=="Success"){
         checked.closest('tr').remove();
         alert('Repair is deleteed');
         console.log('Deleted');
      }else {
      console.log("Repair is NOT deleted "+res);
      alert("Kolokvijum nije obrisan ");

      }
      console.log(res);
  });



}