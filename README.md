yii2-bootstrap-tree
===================
Widget for [bootstrap-treeview](https://github.com/jonmiles/bootstrap-treeview)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist lesha724/yii2-bootstrap-tree "*"
```

or add

```
"lesha724/yii2-bootstrap-tree": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \lesha724\bootstraptree\TreeView::widget([
    'htmlOptions'=>[
                'id'=>'treeview-tabs'
    ],
    'options'=>[
        //https://github.com/jonmiles/bootstrap-treeview#options
        'data'=>$items, // $items structure https://github.com/jonmiles/bootstrap-treeview#data-structure
        'enableLinks'=>true,
        'showTags'=>true,
        'levels'=>3
    ],
    'events'=>[
        //https://github.com/jonmiles/bootstrap-treeview#events
        'onNodeSelected'=>'function(event, data) {
            // Your logic goes here
            alert(data.href);
        }'
    ]
]); ?>
```