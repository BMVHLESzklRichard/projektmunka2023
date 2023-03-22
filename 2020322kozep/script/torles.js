function kitorles(clickedid)
{
    Swal.fire({
        title: 'Biztos törlöd?',
        text: "Nem vonhatod vissza!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Igen letörlöm!',
        focusCancel: true
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
           window.location.href = "../admin/torles.php?id="+clickedid,
          )
        }
      })
}