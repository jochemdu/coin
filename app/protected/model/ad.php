<? 
class Ad{
    public $id;
    public $title;
    public $text;
    public $created;

    public $_table = 'ad';
    public $_primarykey = 'id';
    public $_fields = array('id', 'title', 'text', 'created');
}