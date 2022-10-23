@props([
'id' => uniqid(),
'name' => isset($name) ? $name : $id,
'src'=> '$id',
'alt'=> isset($name) ? $name : $id,
'height'=>'100',
'width'=>'100',
])
<div>
    <!-- Well begun is half done. - Aristotle -->
    {{--<x-visualizador name="Documentos Importantes" src="imagenes/paisaje-digital-en-atardecer_3840x2160_xtrafondos.com.jpg"/>--}}
    <div class="row">
        <div class="col-md-12">
            <img id="{{$id}}" class="img img-fluid img-thumbnail" src="{{asset($src)}}" alt="{{$name}}" style="height: {{$height}}%; width: {{$width}}%;">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <span><strong>{{$name}}</strong></span>
        </div>
    </div>
    <br>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.10.2/viewer.min.css"/>
    <script>
        new Viewer(document.getElementById('{{$id}}'));
    </script>
</div>
