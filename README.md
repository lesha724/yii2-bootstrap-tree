yii2-bootstrap-tree
===================
Виджет основыный на [bootstrap-treeview](https://github.com/patternfly/patternfly-bootstrap-treeview)

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
        'data'=>$items,
        'enableLinks'=>true,
        'showTags'=>true,
        'levels'=>3
    ],
    'events'=>[
        'onNodeSelected'=>'function(event, data) {
            // Your logic goes here
            alert(data.href);
        }'
    ]
]); ?>
```