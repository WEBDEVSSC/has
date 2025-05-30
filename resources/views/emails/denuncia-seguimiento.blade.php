<x-mail::message>

<x-mail::panel>

<p>Se ha registrado un nuevo seguimiento en la denuncia</p>
<p>Folio : SSC/HAS/2025/{{$folio}}</p>

<x-mail::button :url="'https://educacion.saludcoahuila.gob.mx/apps/has/public/buzonSeguimiento'">
    Ir al Buzón de Seguimiento
</x-mail::button>

</x-mail::panel>

<x-mail::subcopy>
  <p><small>Programa de Igualdad de Genero</small></p>
</x-mail::subcopy>

</x-mail::message>