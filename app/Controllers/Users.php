<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        $users = $userModel->findAll();

        return view('users', [
            'users' => $users
        ]);
    }

    public function new(): string
    {
        return view('user_form', [
            'title'   => 'Add Staff | Peralta POS',
            'heading' => 'Add Staff',
            'action'  => site_url('users/create')
        ]);
    }

    public function create()
    {
        $rules = [
            'username' => 'required',
            'full_name' => 'required',
            'password' => 'required|min_length[6]',
            'avatar' => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        // Check if username already exists
        $existingUser = $userModel
            ->where('username', $this->request->getPost('username'))
            ->first();

        if ($existingUser) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', [
                    'username' => 'This username is already taken.'
                ]);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/avatars/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $filename = $avatar->getRandomName();

            service('image')
                ->withFile($avatar->getTempName())
                ->fit(300, 300)
                ->save($uploadPath . $filename);

            $data['avatar'] = $filename;
        }

        $userModel->insert($data);

        return redirect()
            ->to('/users')
            ->with('success', 'Staff account created successfully.');
    }
    public function edit($id): string
{
    $userModel = new UserModel();

    $user = $userModel->find($id);

    if (!$user) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'User not found.'
        );
    }

    return view('user_form', [
        'title'   => 'Edit Staff | Peralta POS',
        'heading' => 'Edit Staff',
        'action'  => site_url('users/update/' . $id),
        'user'    => $user
    ]);
}

public function update($id)
{
    $userModel = new UserModel();

    $user = $userModel->find($id);

    if (!$user) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'User not found.'
        );
    }

    $rules = [
        'username' => 'required',
        'full_name' => 'required',
        'password' => 'permit_empty|min_length[6]',
        'avatar' => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|max_size[avatar,2048]'
    ];

    if (!$this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', $this->validator->getErrors());
    }

    $existingUser = $userModel
        ->where('username', $this->request->getPost('username'))
        ->where('id !=', $id)
        ->first();

    if ($existingUser) {
        return redirect()
            ->back()
            ->withInput()
            ->with('errors', [
                'username' => 'This username is already taken.'
            ]);
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'full_name' => $this->request->getPost('full_name')
    ];

    $password = $this->request->getPost('password');

    if (!empty($password)) {
        $data['password'] = password_hash(
            $password,
            PASSWORD_DEFAULT
        );
    }

    $avatar = $this->request->getFile('avatar');

    if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {

        $uploadPath = FCPATH . 'uploads/avatars/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $filename = $avatar->getRandomName();

        service('image')
            ->withFile($avatar->getTempName())
            ->fit(300, 300)
            ->save($uploadPath . $filename);

        $data['avatar'] = $filename;
    }

    $userModel->update($id, $data);

    return redirect()
        ->to('/users')
        ->with('success', 'Staff account updated successfully.');
}
public function delete($id)
{
    $userModel = new UserModel();

    $user = $userModel->find($id);

    if (!$user) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'User not found.'
        );
    }

    // Delete the avatar file if one exists
    if (!empty($user['avatar'])) {
        $avatarPath = FCPATH . 'uploads/avatars/' . $user['avatar'];

        if (is_file($avatarPath)) {
            unlink($avatarPath);
        }
    }

    $userModel->delete($id);

    return redirect()
        ->to('/users')
        ->with('success', 'Staff account deleted successfully.');
}
}
