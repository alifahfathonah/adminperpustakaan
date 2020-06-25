<?php
class MY_Model extends CI_Model
{
    protected $table             = '';
    protected $perPage           = 10;
    protected $paginationLinkNum = 10;

    public function __construct()
    {
        parent::__construct();

        // Set nama tabel secara otomatis jika tidak dideklarasikan
        // variabel $table di child class.
        parent::__construct();

        if (!$this->table) {
            $this->table = strtolower(str_replace('Model', '', get_class($this)));
        }
    }

    /*
    |-----------------------------------------------------------------
    | Retrieve.
    |-----------------------------------------------------------------
    */
    public function find($id)
    {
        return $this->db->where("$this->table.ID", $id)
                        ->get($this->table)
                        ->row();
    }
    public function query($sql)
    {
        return $this->db->query($sql);
    }

    public function get()
    {
        return $this->db->get($this->table)->row();
    }

    // Mendapatkan multiple record.
    // Override method ini jika memerlukan custom query.
    // Misalnya ketika perlu menambah "where" atau "join".
    public function getAll()
    {
        return $this->db->get($this->table)->result();
    }

    public function orderBy($column, $order = 'asc')
    {
        $this->db->order_by($column, $order);
        return $this;
    }

    public function where($column, $where)
    {
        $this->db->where($column, $where);
        return $this;
    }

    /*
    |-----------------------------------------------------------------
    | Create Update Delete.
    |-----------------------------------------------------------------
    */
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($data)
    {
        return $this->db->update($this->table, $data);
    }

    public function delete()
    {
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    /*
    |-----------------------------------------------------------------
    | Pagination.
    |-----------------------------------------------------------------
    */
    // Mendapatkan multiple record dengan pagination.
    // Override method ini jika memerlukan custom query.
    // Misalnya ketika perlu menambah "where" atau "join".
    public function paginate($page)
    {
        $this->db->limit($this->perPage, $this->calculateRealOffset($page));
        return $this;
    }

    // Menghitung nilai offset berdasarkan nomor halaman.
    public function calculateRealOffset($page)
    {
        if (is_null($page) || empty($page)) {
            $offset = 0;
        } else {
            $offset = ($page * $this->perPage) - $this->perPage;
        }

        return $offset;
    }

    public function select($columns)
    {
        $this->db->select($columns);
        return $this;
    }



    public function orLike($column, $condition)
    {
        $this->db->or_like($column, $condition);
        return $this;
    }

    public function join($table, $type = 'left')
    {
        $this->db->join($table, "$this->table.id_$table = $table.id_$table", $type);
        return $this;
    }



    public function makePagination($baseURL, $uriSegment, $totalRows = null)
    {
        $args = func_get_args();

        $this->load->library('pagination');

        $config = [
            'base_url'         => $baseURL,
            'uri_segment'      => $uriSegment,
            'per_page'         => $this->perPage,
            'total_rows'       => $totalRows,
            'use_page_numbers' => true,
            'num_links'        => 5,
            /*
            'first_link'       => '<img src="' . base_url('asset/images/first.png') . '">',
            'last_link'        => '<img src="' . base_url('asset/images/last.png') . '">',
            'next_link'        => '<img src="' . base_url('asset/images/next.png') . '">',
            'prev_link'        => '<img src="' . base_url('asset/images/previous.png') . '">',
            */
        ];


        if (count($_GET) > 0) {
            $config['suffix']    = '?' . http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        } else {
            $config['suffix']    = http_build_query($_GET, '', "&");
            $config['first_url'] = $config['base_url'];
        }

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }



    /*
    |-----------------------------------------------------------------
    | Form validation.
    |-----------------------------------------------------------------
    */
    public function validate()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(
            ' <code>',
            '</code>'
        );
        $validationRules = $this->getValidationRules();
        $this->form_validation->set_rules($validationRules);
        return $this->form_validation->run();
    }
    public function validateLogin() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(
            '<code>',
            '</code>'
        );
        $getValidationRulesLogin = $this->getValidationRulesLogin();
        $this->form_validation->set_rules($getValidationRulesLogin);
        return $this->form_validation->run();
    }
    public function validateUpload() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters(
            '<code>',
            '</code>'
        );
        $getValidationRulesUpload = $this->getValidationRulesUpload();
        $this->form_validation->set_rules($getValidationRulesUpload);
        return $this->form_validation->run();
    }

    /*
    |-----------------------------------------------------------------
    | Memformat no hp, mengganti "0" dengan "+62".
    |-----------------------------------------------------------------
    */
    public function formatPhoneNumber($num)
    {
        $noHP = $num;
        $pos  = strpos($noHP, '0', 0);

        if ($pos === 0) {
            $noHP = substr_replace($noHP, '+62', 0, 1);
        }

        return $noHP;
    }

    /*
    |-----------------------------------------------------------------
    | Mendapatkan nama di phonebook berdasarkan no hp.
    |-----------------------------------------------------------------
    */
    public function getContactName($phoneNumber)
    {
        $name = $this->db->select("Name")
                         ->where('Number', $phoneNumber)
                         ->get('pbk')
                         ->row();
        return $name;
    }

}
