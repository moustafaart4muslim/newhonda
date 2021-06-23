<p class="mt-8 text-center text-xs text-80">
    By <a href="https://invadems.com" class="text-primary dim no-underline">Invade Media solutions</a>
</p>

<script>

    //Get specs title, to ensure  the use can't enter a manuall value
    var specs;
    specs = [
        <?php


            $specs = App\Models\Specification::with('category')->get();
            // Info($specs);
            $i = 0;
            foreach($specs as $k=>$v){
                $i++;

                $title = $v->en_name . " [" . $v->category->en_name . "]";
                if($i != 1) echo ",";
                echo '"' . $title . '"';
            }

        ?>
    ];


</script>

