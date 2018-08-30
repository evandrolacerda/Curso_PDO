<?php

namespace App\Controller;

/**
 *
 * @author evandro.lacerda
 */
interface ResourcesInterface {
    public function index();
    public function show($id);
    public function edit($id);
    public function destroy($id);
    public function create();
    public function store( Request $request );
    public function update( Request $request, $id );
    
}
