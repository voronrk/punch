<div class="column filter" id="cards-wrapper">
    @foreach($punches as $punch)
        <x-punch-card :punch="$punch" :isAdmin="$isAdmin"/>
    @endforeach
</div>
<script src="resources/js/carousel.js"></script>