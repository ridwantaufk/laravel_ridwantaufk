// $(document).on("click", ".btn-delete", function () {
//     const url = $(this).data("url");

//     Swal.fire({
//         title: "Yakin ingin menghapus?",
//         text: "Data tidak bisa dikembalikan!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#d33",
//         cancelButtonColor: "#6c757d",
//         confirmButtonText: "Ya, hapus!",
//         cancelButtonText: "Batal",
//         backdrop: `rgba(0,0,0,0.4)`,
//         willOpen: () => {
//             document
//                 .querySelector(".swal2-container")
//                 ?.classList.add("swal-blur");
//         },
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: url,
//                 type: "POST",
//                 data: {
//                     _method: "DELETE",
//                     _token: "{{ csrf_token() }}",
//                 },
//                 success: function () {
//                     Swal.fire({
//                         title: "Terhapus!",
//                         text: "Data berhasil dihapus.",
//                         icon: "success",
//                         timer: 1500,
//                         showConfirmButton: false,
//                         background: "#fff",
//                         backdrop: "rgba(0, 0, 0, 0.3)",
//                     }).then(() => {
//                         location.reload();
//                     });
//                 },
//                 error: function () {
//                     Swal.fire({
//                         title: "Gagal!",
//                         text: "Gagal menghapus data. Coba lagi nanti.",
//                         icon: "error",
//                         confirmButtonColor: "#d33",
//                         background: "#fff",
//                         backdrop: "rgba(0,0,0,0.4)",
//                     });
//                 },
//             });
//         }
//     });
// });
