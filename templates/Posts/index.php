<div>
<?php foreach ($articles as $key=>$article) {?>
<a href="#">
   <div>
   <p><?= $article->title ?> </p>
   <p><?= $article->details ?></p>
   </div>
</a>
<br/>
<?php
}
?>
<ul class="pagination">
<?= $this->Paginator->prev("<<") ?>
<?= $this->Paginator->numbers() ?>
<?= $this->Paginator->next(">>") ?>
</ul>
</div>