<?php

class Migration_Add_Settings extends CI_MIgration{
	
	public function up(){
		$this->dbforge->add_fields(array(
			'settings_id'=>array(
				'type'=>'INT',
				'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			),
			'settings_name'=>array(
				'type' => 'MEDIUMTEXT',
			),
			'settings_value'=>array(
				'type' => 'VARCHAR',
                'constraint' => '255',
			)
		)
		);
		$this->dbforge->add_key('settings_id',TRUE);
		$this->dbforge->create_table('store_settings');
	}
	
	public function down(){
		$this->dbforge->drop_table('store_settings');
	}
}

?>