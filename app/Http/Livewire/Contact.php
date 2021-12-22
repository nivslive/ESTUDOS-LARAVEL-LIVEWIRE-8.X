<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Contact extends Component
{


    public $data, $name, $email, $selected_id;
    public $updateMode = false;

    public function render()
    {


        $data = $this->data = Contact::all();
        return view('users.contacts')->with(compact('data'));
    }



    private function resetInput()
    {
        $this->name = null;
        $this->email = null;
    }
    
    
    
    public function store() {

            $this->validate([
                'name' => 'required|min:5',
                'email' => 'required|email:rfc,dns'
            ]);
        }


        public function edit($id)
        {

            $record = Contact::findOrFail($id);
            $this->select_id = $id;
            $this->name = $record->name;
            $this->email = $record->email;
            $this->updateMode = true;

        }


        public function update() {
            $this->validate([
                'selected_id' => 'required|numeric',
                'name' => 'required|min:5',
                'email' => 'required|email:rfc,dns'
            ]);

            if($this->selected_Id) {
                $record = Contact::find($this->selected_id);
                $record->update([
                    'name' => $this->name,
                    'email' => $this->email
                ]);
                $this->resetInput();
                $this->updateMode = false;
            }
        }

        public function destroy($id)
        {
            if ($id) {
                $record = Contact::where('id', $id);
                $record->delete();
            }
        }

    
}
