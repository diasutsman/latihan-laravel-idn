function sweetAlert(ev, msgTitle, msgText = 'This action cannot be undone!') {
    ev.preventDefault();
    console.log(this, msgTitle);
    // return swal({
    //     title: msgTitle,
    //     text: msgText,
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    // });

    // .then((willDelete) => {
    //     if (willDelete) {
    //         swal("Poof! Your imaginary file has been deleted!", {
    //             icon: "success",
    //         });
    //     } else {
    //         swal("Your imaginary file is safe!");
    //     }
    // });
}
