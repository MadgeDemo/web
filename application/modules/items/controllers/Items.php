<?php
(defined('BASEPATH')) or exit('No direct script access allowed!');
/**
* 
*/
class Items extends MY_Controller
{
    var $keys = array();
	function __construct()
	{
		parent:: __construct();
		$this->load->model('items_model');
		$this->isLoggedIn();
		$this->data	= array_merge($this->data,$this->load_libraries(array('datatables')));
        $this->data['page'] = 'Inventory';
        $this->keys = $this->items_model->getKeys();
	}

	public function index()
	{
		
		$this->data['content_view'] = 'items/items_view2';
        // $this->data['content_view'] = 'items/test_view';
        $this->template2($this->data);
	}

    function load_inventory()
    {
        // $inventory = $this->items_model->getItemInventories();
        $inventory = $this->items_model->itemList();
        // echo "<pre>";print_r($inventory);die();
                
        $count = 1;
        $table = "";

        foreach ($inventory as $key => $value) {
            $value = (object)$value;
            $inventory = $value->Inventory;
            if ($this->session->userdata('suser') == '4' || $this->session->userdata('suser') == 4) {
                    if($inventory >=20){
                        $inventory = "<label class='label label-success'>SUFFICIENT</label>";
                    }else if($inventory<20 && $inventory>0){
                        // $inventory = "<label class='label label-warning'>LOW</label>";
                        $inventory = number_format(round($inventory));
                    }else if($inventory==0){
                        $inventory = "<label class='label label-danger'>UNAVAILABE</label>";
                    }else{
                        $inventory = number_format(round($inventory));
                    }
                }else {
                    $inventory = number_format(round($inventory));
                }
            $table .= "<tr>";
            $table .= "<td>".$count."</td>";
            $table .= "<td>".$value->Description."</td>";
            $table .= "<td>".$inventory."</td>";
            $table .= "<td>".number_format(round($value->Unit_Price,2))."</td>";
            $table .= "<td>".number_format($value->Reserved_Quantity)."</td>";
            $table .= "<td>".$value->Brand."</td>";
            $table .= "<td>".$value->RIM."</td>";
            $table .= "<td>".$value->Pattern."</td>";
            $table .= "<td>".$value->Category."</td>";
            $table .= "<td data-target='#myModal2' data-toggle='modal' onclick='load_leadger(".json_encode($value->No).")' style='cursor:pointer;'><center><span class='label label-success'><span class='fa fa-desktop'></span></span></center></td>";
            // $table .= "<td data-target='#myModal2' data-toggle='modal' onclick='load_leadger(".$value->No.")' style='cursor:pointer;'><center><span class='fa fa-desktop'></span></center></td>";
            $table .= "</tr>";
            $count++;
        }
        // die();
        $data['table'] = $table;
        // echo "<pre>";print_r($data);die();
        $this->load->view('items_table_view', $data);
    }

    function UniqueLedger($item=null)
    {
        $No = $item;
        $data = json_decode($this->items_model->getUniqueItemLedger($No));
        $table = '';
        
        foreach ($data as $key => $value) {
            $lc = $value->locationCode;
            $qty = round($value->qty);
            if ($qty != 0 || $qty != '0') {
                if ($this->session->userdata('suser') == '4' || $this->session->userdata('suser') == 4) {
                    if($qty >=20){
                        $inventory = "<label class='label label-success'>SUFFICIENT</label>";
                    }else if($qty<20 && $qty>0){
                        // $inventory = "<label class='label label-warning'>LOW</label>";
                        $inventory = $qty;
                    }else if($qty==0){
                        $inventory = "<label class='label label-danger'>UNAVAILABE</label>";
                    }else{
                        $inventory = $qty;
                    }
                }else {
                    $inventory = $qty;
                }
                $table .= "<tr>";
                $table .= "<td>".$value->locationCode."</td>";
                $table .= "<td>".$inventory."</td>";
                $table .= "</tr>";
            }
        }
        $data['table'] = $table;
        $this->load->view('UniqueLedger_view', $data);
    }

    function test()
    {
        $inventory = json_decode($this->items_model->getInventory());

        // echo "<pre>";print_r($inventory);die();
        $table = "";
        $count = 1;
        foreach ($inventory as $key => $value) {
            $inventory = $this->remove_virtual($value->No);
            if ($this->session->userdata('suser') == '4' || $this->session->userdata('suser') == 4) {
                    if($value->Inventory >=20){
                        $inventory = "SUFFICIENT";
                    }else if($value->Inventory<20 && $value->Inventory>0){
                        // $inventory = "LOW";
                        $inventory = $inventory;
                    }else if($value->Inventory==0){
                        $inventory = "UNAVAILABE";
                    }else{
                        $inventory = $value->Inventory;
                    }
                }else {
                    $inventory = $value->Inventory;
                }
            $table .= "<tr>";
            $table .= "<td>".$count."</td>";
            $table .= "<td>".$value->Description."</td>";
            $table .= "<td>".$inventory."</td>";
            $table .= "<td>".$value->Unit_Price."</td>";
            $table .= "<td>".$value->Item_Category_Code."</td>";
            $table .= "<td>".$value->RIM."</td>";
            $table .= "<td>".$value->Pattern."</td>";
            $table .= "<td>".$value->Shortcut_Dimension_4_Code."</td>";
            $table .= "<td data-target='#myModal2' data-toggle='modal' onclick='load_leadger(".json_encode($value->No).")' style='cursor:pointer;'><center><span class='label label-success'><span class='fa fa-desktop'></span></span></center></td>";
            // $table .= "<td data-target='#myModal2' data-toggle='modal' onclick='load_leadger(".$value->No.")' style='cursor:pointer;'><center><span class='fa fa-desktop'></span></center></td>";
            $table .= "</tr>";
            $count++;
        }
        $this->data['inventory'] = $table;
        $this->data['content_view'] = 'items/items_view2';

        $this->template2($this->data);
    }
    function test2()
    {

        $itemList = $this->items_model->getItemCount();
        $inventory = json_decode($this->items_model->getInventory());
        echo "<pre>";print_r(json_decode($itemList));echo "</pre>";;
        echo "<pre>";print_r($inventory);die();

    }

    // function serversideprocessing()
    // {
    //     $request = $this->input->get();
    //     // print_r($request);die();
    //     $offset = self::offset($request);
    //     $limit = self::limit($request);
    //     $search = self::search($request);
    //     $data = self::getData($offset,$limit,$search);
    //     // print_r($data);die();
    //     $recordsFiltered = intval($this->items_model->getItemCount());
    //     $recordsTotal = $recordsFiltered;
    //     echo json_encode(array(
    //         "draw"            => isset ( $request['draw'] ) ?
    //             intval( $request['draw'] ) :
    //             0,
    //         "recordsTotal"    => intval( $recordsTotal ),
    //         "recordsFiltered" => intval( $recordsFiltered ),
    //         "data"            => $this->data_output( $this->columns(), $data)
    //         )
    //     );
    // }

    // function limit($request)
    // {
    //     return intval($request['length']);
    // }

    // function offset($request)
    // {
    //     $start = $request['start'];
    //     if ($start==0) {
    //         $bookmark = NULL;
    //     }else {
    //         $start -= 1;
    //         $bookmark = $this->keys[$start];
    //     }

    //     return $bookmark;
    // }

    // function search($request)
    // {
    //     $search_value = $request['search']['value'];
    //     if ($search_value == null || $search_value == '') {
    //         return NULL;
    //     } else {
    //         $search_value = $search_value.'*';
    //         return strtoupper($search_value);
    //     }
    // }

    // function getData($bookmarkKey=NULL,$limit=NULL,$search=NULL){
    //     $items = json_decode($this->items_model->getTest($bookmarkKey, $limit, $search));
    //     // echo "<pre>";print_r($items);die();
    //     $data = array();
    //     $count = 1;
    //     foreach ($items as $key => $value) {
    //         $inventory = $this->remove_virtual($value->No);
    //         if ($this->session->userdata('suser') == '4' || $this->session->userdata('suser') == 4) {
    //                 if($inventory >=20){
    //                     $inventory = "<label class='label label-success'>SUFFICIENT</label>";
    //                 }else if($inventory<20 && $inventory>0){
    //                     // $inventory = "<label class='label label-warning'>LOW</label>";
    //                     $inventory = $inventory;
    //                 }else if($inventory==0){
    //                     $inventory = "<label class='label label-danger'>UNAVAILABE</label>";
    //                 }else{
    //                     $inventory = $inventory;
    //                 }
    //             }else {
    //                 $inventory = $inventory;
    //             }
    //         $data[] = array(
    //                     "description" => $value->Description,
    //                      0=> $value->Description,
    //                     "inventory" => $inventory,
    //                      1=> $inventory,
    //                     "unit_price" => number_format($value->Unit_Price),
    //                      2=> number_format($value->Unit_Price),
    //                     "reserved_quantity" => number_format($value->Reserved_Qty_on_Sales_Orders),
    //                      3 => number_format($value->Reserved_Qty_on_Sales_Orders),
    //                     "brand" => $value->Item_Category_Code,
    //                      4=> $value->Item_Category_Code,
    //                     "rim" => $value->RIM,
    //                      5=> $value->RIM,
    //                     "pattern" => $value->Pattern,
    //                      6=> $value->Pattern,
    //                     "category" => $value->Shortcut_Dimension_4_Code,
    //                      7=> $value->Shortcut_Dimension_4_Code,
    //                     "item_ledger" => "<a class='load-modal' href='".base_url('items/UniqueLedger/'.$value->No)."'value='".$value->No."' data-toggle='modal' data-target='#myModal2'><span class='label label-success'><span class='fa fa-desktop'></span></span></a>",
    //                      8=> "<a class='load-modal' href='".base_url('items/UniqueLedger/'.$value->No)."' value='".$value->No."' data-toggle='modal' data-target='#myModal2'><span class='label label-success'><span class='fa fa-desktop'></span></span></a>"
    //         );
    //         $count++;
    //     }
    //     return $data;
    // }

    // function columns ()
    // {
    //     return array(
    //             array( 'db' => 'description', 'dt' => 0 ),
    //             array( 'db' => 'inventory',  'dt' => 1 ),
    //             array( 'db' => 'unit_price',   'dt' => 2 ),
    //             array( 'db' => 'reserved_quantity',   'dt' => 3 ),
    //             array( 'db' => 'brand',     'dt' => 4 ),
    //             array( 'db' => 'rim',     'dt' => 5 ),
    //             array( 'db' => 'pattern',     'dt' => 6 ),
    //             array( 'db' => 'category',     'dt' => 7 ),
    //             array( 'db' => 'item_ledger',     'dt' => 8 )
    //         );
    // }

    // function data_output ( $columns, $data )
    // {
    //     $out = array();

    //     for ( $i=0, $ien=count($data) ; $i<$ien ; $i++ ) {
    //         $row = array();

    //         for ( $j=0, $jen=count($columns) ; $j<$jen ; $j++ ) {
    //             $column = $columns[$j];

    //             // Is there a formatter?
    //             if ( isset( $column['formatter'] ) ) {
    //                 $row[ $column['dt'] ] = $column['formatter']( $data[$i][ $column['db'] ], $data[$i] );
    //             }
    //             else {
    //                 $row[ $column['dt'] ] = $data[$i][ $columns[$j]['db'] ];
    //             }
    //         }

    //         $out[] = $row;
    //     }

    //     return $out;
    // }

    public function remove_virtual($itemNo)
    {

        // $itemLedger = $this->items_model->getUniqueItemLedger($itemNo);
        $itemLedger = $this->items_model->getUniqueItemLedger3($itemNo);
        // $uri = "http://DESKTOP-DQO3OBA:8048/GLACIER-NAV15/OData/Company('SilverStone%20Tyres%20Ltd')/itemLedgerEntries?\$filter=Item_No%20eq%20'$itemNo'";
        // $itemLedger = $this->items_model->getOData($uri);
        // echo "<pre>";print_r($itemLedger);die();
        $itemLedger = json_decode($itemLedger);
        // echo "<pre>";print_r($itemLedger);die();
        $quantity = 0;
        foreach ($itemLedger as $key => $value) {
            $qty = round($value->qty);
            $quantity += $qty;
        }
        
        return $quantity;
    }
}
?>