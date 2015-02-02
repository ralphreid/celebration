<?php
class WrsvpDb
{
    private $_db;
    private $_tables = array(
        'guests' => 'wrsvp_rsvp_guests'
    );
    private $_db_version = 2;

    /*
     * $db: Injected $wpdb
     */

    public function __construct($db)
    {
        $this->_db = $db;
    }

    private function _t($name)
    {
        if (!isset($this->_tables[$name])) {
            throw new Exception(__('Table does not exist', 'wi-rsvp'));
        }
        return $this->_db->prefix . $this->_tables[$name];
    }

    public function setupTables()
    {
        $has_table = $this->_db->get_results("SHOW TABLES LIKE '" . $this->_t('guests') . "'");
        if (empty($has_table)) {
            $this->_db->query("
                CREATE TABLE IF NOT EXISTS " . $this->_t('guests') . " (
                    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                    `first_name` varchar(255) NOT NULL,
                    `last_name` varchar(255) NOT NULL,
                    `phone` varchar(30) NOT NULL,
                    `email` varchar(255) NOT NULL,
                    `attending` enum('Y','N','P') NOT NULL DEFAULT 'P',
                    `total` int(11) NOT NULL,
                    `vegans` int(11) NOT NULL,
                    `kids` int(11) NOT NULL,
                    `message` TEXT DEFAULT NULL,
                    `invited_datetime` datetime DEFAULT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE KEY `email` (`email`)
                ) ENGINE=InnoDB  DEFAULT CHARSET=utf8"
            );
            update_option('wrsvp_db_version', $this->_db_version);
        }
    }

    public function updateTables()
    {
        $has_table = $this->_db->get_results("SHOW TABLES LIKE '" . $this->_t('guests') . "'");
        if (empty($has_table)) {
            $this->setupTables();
        }
        $version = get_option('wrsvp_db_version');
        switch ($version) {
            case false:
            case 1:
                $this->_db->query('ALTER TABLE ' . $this->_t('guests') . ' ADD `message` TEXT DEFAULT NULL AFTER `kids`');
                update_option('wrsvp_db_version', $this->_db_version);
                break;
            default:
                break;
        }
    }

    public function getTable($name)
    {
        return $this->_t($name);
    }

    public function getGuestsList($sort = null, $dir = null)
    {
        $sortable = array('last_name', 'first_name', 'attending',
            'phone', 'email', 'total', 'kids', 'vegans');
        if (empty($sort)) {
            $sort = $sortable[0];
        }
        if (empty($dir)) {
            $dir = 'asc';
        }
        if (!in_array(strtolower($sort), $sortable) ||
            !in_array(strtolower($dir), array('asc', 'desc'))
        ) {
            $sort = $sortable[0];
            $dir = 'asc';
        }
        $sel = 'SELECT * FROM ' . $this->_t('guests') .
            ' ORDER BY ' . $sort . ' ' . $dir;
        return $this->_db->get_results($sel);
    }

    public function getGuest($id)
    {
        return $this->_db->get_row(
            $this->_db->prepare(
                'SELECT * FROM ' . $this->_t('guests') . ' WHERE id = %d',
                $id
            )
        );
    }

    public function addGuest($data, $format = null)
    {
        $this->_db->insert($this->_t('guests'), $data, $format);
    }

    public function updateGuest($data, $id, $format = null)
    {
        $this->_db->update($this->_t('guests'), $data, array('id' => $id),
            $format, array('%d'));
    }

    public function deleteGuest($id)
    {
        $this->_db->query(
            $this->_db->prepare(
                'DELETE FROM ' . $this->_t('guests') . ' WHERE id = %d',
                $id
            )
        );
    }

    public function deleteGuests($ids)
    {
        $ids = array_map('intval', $ids);
        $this->_db->query(
            sprintf(
                'DELETE FROM ' . $this->_t('guests') . ' WHERE id IN (%s)',
                implode(',', $ids)
            )
        );
    }

    public function findGuestByEmail($email)
    {
        return $this->_db->get_row(
            $this->_db->prepare(
                'SELECT * FROM ' . $this->_t('guests') . ' WHERE email = %s',
                $email
            )
        );
    }

    public function getGuests($ids)
    {
        $ids = array_map('intval', $ids);
        return $this->_db->get_results(
            sprintf(
                'SELECT * FROM ' . $this->_t('guests') . ' WHERE id IN (%s)',
                implode(',', $ids)
            )
        );
    }

    public function getGuestStats()
    {
        $stats = $this->_db->get_results(
            'SELECT SUM(total) AS total, SUM(kids) AS kids, SUM(vegans) AS vegans,' .
                ' COUNT(*) AS responses, attending FROM ' . $this->_t('guests') .
                ' GROUP BY attending'
        );
        $ret = array();
        foreach ($stats as $row) {
            $ret[$row->attending] = $row;
        }
        return $ret;
    }
}