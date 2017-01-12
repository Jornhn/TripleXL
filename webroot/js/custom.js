/**
 * Created by jornholterman on 11-01-17.
 */

$(".sollicitant-delete").click(function(){
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {
        swal(
            'Deleted!',
            'Your file has been deleted.',
            'success'
        )
    })
});