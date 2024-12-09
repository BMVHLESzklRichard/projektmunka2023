function perback(clickedid)
{
    Swal.fire({
        title: 'Biztosan visszaadod a felhasználó jogosultáságát?',
        text: "Akármikor visszavonhatod!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Igen!',
        focusCancel: true
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
           window.location.href = "../admin/adminjogback.php?id="+clickedid,
          )
        }
      })
}


function perdelete(clickedid)
{
    Swal.fire({
        title: 'Biztosan letiltod a felhasználót?',
        text:"Akármikor visszavonhatod!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Igen!',
        focusCancel: true
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
           window.location.href = "../admin/admintorles.php?id="+clickedid,
          )
        }
      })
}