<x-mail::message>

<x-mail::panel>

<p>Se ha registrado una nueva denuncia</p>
<p>Folio : SSC/HAS/2025/{{$folio}}</p>

<x-mail::button :url="url('admin/' . $id . '/detalles')">
Ver denuncia
</x-mail::button>

</x-mail::panel>

<x-mail::subcopy>
  <p><small>Programa de Igualdad de Genero</small></p>
</x-mail::subcopy>

</x-mail::message>