<?php

namespace fundstarter\storage\Comment;

//use fundstarter\storage\Comment\CommentRepository as CommentRepo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Comment;

class CommentRepository implements ICommentRepository {

    public function all() {
        $comment = new Comment;
        return $comment->all();
    }

    public function create(array $input) {
        $comment = new Comment;
        $comment->projectid = $input['projectid'];
        $comment->userid = $input['userid'];
        $comment->comment = $input['comment'];
        $comment->postedon = Carbon::now();
        $comment->save();
    }

    public function update(array $input) {
        $email = Session::get('email');
        $id = $this->getid($email);
        $comment = $this->find($id)->first();
        $comment->id = $input['id'];
        $comment->projectid = $input['projectid'];
        $comment->userid = $input['userid'];
        $comment->comment = $input['comment'];
        $comment->postedon = $input['postedon'];
        $comment->save();
    }

    public function getbyid($id) {
        $comment = new Comment;
        return $comment->where('id', '=', $id)->get();
    }

    public function getcountbyuserid($id) {
        $comment = new Comment;
        return $comment->where('userid', '=', $id)->count();
    }

    public function getbyuserid($id) {
        $comment = new Comment;
        return $comment->join('projects', 'comments.projectid', '=', 'projects.id')->where('comments.userid', '=', $id)->get(array('title', 'comment', 'postedon', 'projectid'));
    }

    public function getalldetailsbyprojectid($id) {
        $comment = new Comment;
        return $comment->join('users', 'comments.userid', '=', 'users.id')->where('comments.projectid', '=', $id)->get(array('comments.id', 'comments.comment', 'comments.postedon', 'comments.userid', 'users.firstname', 'users.lastname', 'users.image', 'users.email', 'users.username'));
    }

    public function getdetailsbyid($id) {
        $comment = new Comment;
        return $comment->join('users', 'comments.userid', '=', 'users.id')->join('projects', 'comments.projectid', '=', 'projects.id')->where('comments.id', '=', $id)->first(array('comments.id', 'comments.comment', 'comments.postedon', 'projects.title', 'users.username', 'comments.projectid'));
    }

    public function deletebyid($id) {
        $comment = new Comment;
        return $comment->where('id', '=', $id)->delete();
    }

    public function deletebyprojectid($id) {
        $comment = new Comment;
        return $comment->where('projectid', '=', $id)->delete();
    }

    public function getbyprojectid($projectid) {
        $comment = new Comment;
        return $comment->join('users', 'comments.userid', '=', 'users.id')->where('comments.projectid', '=', $projectid)->get(array('comments.id', 'comments.comment', 'comments.postedon', 'users.username'));
    }

    public function updatecomment(array $input) {
        $comment = new Comment;
        $data = $comment->find($input['id']);
        $data->comment = $input['comment'];
        $data->save();
        return $data->projectid;
    }

}
