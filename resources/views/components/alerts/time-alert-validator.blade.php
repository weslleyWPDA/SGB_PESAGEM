 {{-- erros validation --}}
 <div style="width: 500px;margin-left:40%;text-align:center;height: 40px;position: absolute;">
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li style="list-style-type: none;">{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
 </div>
 {{-- fim erros validation --}}
 {{-- script de tempo para fechar o alerta --}}
 <script src="{{ URL::asset('/publico/js/jquery.js') }}"></script>
 <script type="text/javascript">
     $(document).ready(function() {

         window.setTimeout(function() {
             $(".alert").fadeTo(700, 0).slideUp(700, function() {
                 $(this).remove();
             });
         }, 2500);

     });
 </script>
