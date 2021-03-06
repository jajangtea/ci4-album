<?php
// set title
$title = 'Albums';
$this->setVar('title', $title);

// extends layout
echo $this->extend('Album\Views\layout');

// begin section content
echo $this->section('content');
?>
<h1> <?php echo esc($title); ?></h1>
<p>
    <?php echo anchor('album/add', 'Add new album'); ?>
</p>

<?php
echo form_open('album', ['method' => 'get']);
echo form_input('keyword', esc($keyword), ['placeholder' => 'Search keyword']);
echo form_close();
?>

<div style="background-color: green;">
    <?php
        $session = session();
        echo $session->getFlashdata('status');
    ?>
</div>

<table class="table">
    <tr>
        <th>Title</th>
        <th>Artist</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($albums as $album) : ?>
        <tr>
            <td><?php echo esc($album->title) ?></td>
            <td><?php echo esc($album->artist) ?></td>
            <td>
                <?php echo anchor(sprintf('album/edit/%d', $album->id), 'Edit'); ?>
                <?php echo anchor(sprintf('album/delete/%d', $album->id), 'Delete', ['onclick'=>'return confirm(\'Are you sure?\')']); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php echo $pager->links() ?>

<?php
// end section content
echo $this->endSection();
?>