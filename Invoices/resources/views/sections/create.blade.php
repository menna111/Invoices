<div class="modal-header">
    <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
</div>
<form  id="add">
   @csrf

    <div class="modal-body">


        <div class="form-group">
            <label for="section_name">اسم القسم</label>
            <input type="text" class="form-control" name="section_name" id="section_name" >
            @error('section_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description"> ملاحظات</label>
            <textarea  class="form-control" name="description" id="description"rows="3" ></textarea>
        </div>


    </div>
    <div class="modal-footer">
        <button class="btn ripple btn-primary" type="submit">تأكيد</button>
        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>

    </div>
</form>


<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add').submit(function (e){
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            method:"POST",
            url:"{{ route('sections.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {

                if(response.status == true){
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: response.msg,
                    })

                    window.location.reload();
                }else{
                    console.log(response.msg);
                    Swal.fire({
                        icon: 'error',
                        title: 'error',
                        text: response.msg,
                    })
                }

            }
        })
    })
</script>
