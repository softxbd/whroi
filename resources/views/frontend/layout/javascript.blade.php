<script src="{{ asset('frontend/js/index.js') }}"></script>
<script src="{{ asset('frontend/js/out-story.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".get_video_url").on('click',function (e) {
            e.preventDefault();

            $(".get_video_url").removeClass("video_background");
            $(this).addClass("video_background");
            let video_url = $(this).attr("video_url");
            $("#video_placeholder").attr("src",video_url);


        });
    })
</script>
