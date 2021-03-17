
<main class="container ">
        <div class="row  ">
            <div class=" col-12 titleHome mt-4 ">
                <h4>Les tests</h4>
            </div>
            <div class="m-auto">
                <form  action="" method="GET">
                    <input type="text" name="s" id="s" value="<?=$s?>">
                    <input type="submit" value="Rechercher">
                </form>
            </div>
            <div class="row col-12 justify-content-center m-auto ">
                <?php foreach($allGames as $picture): ?>
                <div class="card bg-dark col-12  col-md-5 p-0 mt-3 mr-md-2">
                    <a href="/controllers/testCtrl.php?id=<?=$picture->id?>"> <img src="/assets/img/menu/<?= $picture->id ?>.png" class="card-img float-left"
                            alt="<?= $picture->title ?>">
                    </a>
                </div>
                <?php endforeach ?>
                
            </div>
         
        </div>
        <nav aria-label="...">
            <ul class="pagination pagination-sm">
                <?php
                for($i=1;$i<=$nbPages;$i++){
                    if($i==$currentPage){ ?>    
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">
                        <?=$i?> 
                        <span class="visually-hidden">(current)</span>
                        </span>
                    </li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" href="?currentPage=<?=$i?>&s=<?=$s?>"><?=$i?></a></li>
                <?php } 
                    }?>
            </ul>
        </nav>
</main>