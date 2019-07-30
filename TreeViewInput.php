<?php
namespace lesha724\bootstraptree;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\base\Model;


class TreeViewInput extends TreeView {
    /**
     * @var Model the data model that this widget is associated with.
     */
    public $model;

    /**
     * @var string the model attribute that this widget is associated with.
     */
    public $attribute;

    /**
     * @var string the input name. This must be set if [[model]] and [[attribute]] are not set.
     */
    public $name;

    /**
     * @var string the input value.
     */
    public $value;


    protected $defaultOptions = [
        //https://github.com/patternfly/patternfly-bootstrap-treeview#options
        //'data'=>$items,
        'enableLinks'=>false,
        //'showTags'=>true,
        'levels'=>1,
        //'backColor'=>'',
        //'multiSelect'=>true,
        'showCheckbox'=>true,
        'partiallyCheckedIcon'=> "icon-line-awesome-minus-square icon-tree",
        'uncheckedIcon' => "icon-line-awesome-stop icon-tree",
        'checkedIcon' => "icon-line-awesome-check-square color-highlight icon-tree",
        'collapseIcon' => 'icon-line-awesome-minus',
        'expandIcon' => 'icon-line-awesome-plus',
        'hierarchicalCheck'=>true,
        'propagateCheckEvent'=>true,
        //'changedNodeColor'=>'red',
        //'highlightChanges'=>true,
    ];

    /**
     * @return boolean whether this widget is associated with a data model.
     */
    protected function hasModel()
    {
        return $this->model instanceof Model && $this->attribute !== null;
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        if (!$this->hasModel()) {
            throw new \Exception('Model must be set');
        }

        if ($this->hasModel()) {
            $this->value = Html::getAttributeValue($this->model, $this->attribute);
        }

        $this->events = [
            //https://github.com/patternfly/patternfly-bootstrap-treeview#events
            'onNodeChecked'=>"function(event, node) {
                $('.storage-sel-{$this->_id} option[value='+node.id+']').prop('selected', true);
            }",
            'onNodeUnchecked'=>"function(event, node) {
                $('.storage-sel-{$this->_id} option[value='+node.id+']').prop('selected', false);
            }",
            'onRendered'=>"function(event, nodes) {
                $('.storage-sel-{$this->_id} option:selected').each(function(i,e){
                    var patttern = '^' + $(e).val() + '$';
                    var node = $('#{$this->_id}').treeview('findNodes', [patttern, 'id']);
                    $('#{$this->_id}').treeview('toggleNodeChecked', [ node, { silent: true } ]);
                });
            }",

        ];

        $this->options = array_replace_recursive($this->defaultOptions, $this->options);


        //Container for storage
        $html = '';
        //display:block; max-height:200px; overflow-y:auto;
        $wrapperOptions = ArrayHelper::getValue($this->options, 'wrapperOptions', []);
        $wrapperOptions = array_replace_recursive(['id'=>'tree-wrapper-'.$this->_id], $wrapperOptions);
        $html = Html::beginTag('div', $wrapperOptions);
        $html .= parent::run();
        $html .= Html::endTag('div');

        //TreeView
        $html .= $this->getInput();

        return $html;
    }


    /**
     * Generates the hidden input for storage
     *
     * @return string
     */
    public function getInput()
    {
        $html = '';

        $items = [];
        $this->getItemsRecursive($this->options['data'], $items);

        //$html .= Html::activeCheckboxList($this->model, $this->attribute, $items);
        $html .= Html::activeDropDownList($this->model, $this->attribute, $items, ['multiple'=>true, 'class' => 'form-control storage-sel-'.$this->_id, 'style'=>'display:none']);

        return $html;
    }

    /**
     *
     * @param array $data
     * @param array $values
     */
    public function getItemsRecursive($data, &$values) {

        foreach ($data as $item) {
            if (isset($item['id'])) $values[$item['id']] = $item['text'];
            if (isset($item['nodes'])) {
                $this->getItemsRecursive($item['nodes'], $values);
            }
        }

    }
}

?>