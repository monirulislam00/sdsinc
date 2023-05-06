<!-- Modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-info">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="profile-modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@push('profile-js')
    <script>
        $(document).on('click', ".see-profile", function() {
            let id = $(this).data("id");
            $.ajax({
                url: "api/member/" + id,
                method: "get",
                success: function(response, index) {
                    //console.log(response)
                    let profile = `
                    <img src="${response.url +'/'+ response.data.image}" alt="" class="max-w-[200px] h-auto rounded-sm">
                     <h4 class="mt-2">${response.data.name}</h4>
                     <h4>${response.data.designation}</h4>
                     <h4>${response.data.phone}</h4>
                     <h4>${response.data.email}</h4>
                       <p>
                            ${response.data.description}
                        </p>
                    `;
                    $("#profile-modal-body").html(profile)
                },
                error: function(error, request) {
                    // console.log(error)
                    // console.log(request)
                    alert('internal server error')
                }
            });

        });
    </script>
@endpush
