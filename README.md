yii2-bootstrap-tree
===================
Widget for [bootstrap-treeview](https://github.com/patternfly/patternfly-bootstrap-treeview)

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

<?php
// Example of data. $items structure https://github.com/patternfly/patternfly-bootstrap-treeview#data-structure
$items = [
    [
        'text' => 'Node 1'
        'icon' => "glyphicon glyphicon-stop",
        'selectedIcon' => "glyphicon glyphicon-stop",
        'href' => "#node-1",
        'selectable' => true,
        'state' => [
            'checked' => true,
            'disabled' => true,
            'expanded' => true,
            'selected' => true
        ],
        'tags' => ['available'],
        ...,
        'nodes'=>
        [
            ...
        ]
    ],
    [
        'text' => 'Folder 2',
        'nodes' => [
            ['text' => 'Node 2.1'],
            ['text' => 'Node 2.2']
        ]
    ]
];
?>

<?= \lesha724\bootstraptree\TreeView::widget([
    'htmlOptions'=>[
                'id'=>'treeview-tabs'
    ],
    'options'=>[
		//https://github.com/patternfly/patternfly-bootstrap-treeview#options
        'data'=>$items,
        'enableLinks'=>true,
        'showTags'=>true,
        'levels'=>3
    ],
    'events'=>[
		//https://github.com/patternfly/patternfly-bootstrap-treeview#events
        'onNodeSelected'=>'function(event, data) {
            // Your logic goes here
            alert(data.href);
        }'
    ]
]); ?>
```

Links
-----
* [items structure](https://github.com/patternfly/patternfly-bootstrap-treeview#data-structure)
* [widget options](https://github.com/patternfly/patternfly-bootstrap-treeview#options)
* [js events](https://github.com/patternfly/patternfly-bootstrap-treeview#events)
