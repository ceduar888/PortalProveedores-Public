<script>
    $(document).ready(function() {

        $('#pais').change(function() {
            let pais = $(this).val();
            $('#codigo_pais').html('<option value="">Cargando...</option>');

            if(pais) {
                let codigo = `<option value="${pais}">${pais}</option>`;
                $('#codigo_pais').html(codigo);
            }
        }); 

        $('#municipio').change(function() {
            let municipio = $(this).val();
            $('#codigo_municipio').html('<option value="">Cargando...</option>');

            if(municipio) {
                let codigo = `<option value="${municipio}">${municipio}</option>`;
                $('#codigo_municipio').html(codigo);
            }
        }); 

    });
</script>