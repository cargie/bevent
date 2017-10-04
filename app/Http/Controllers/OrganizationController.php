<?php

namespace App\Http\Controllers;

use App\DataTables\OrganizationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Repositories\OrganizationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrganizationController extends AppBaseController
{
    /** @var  OrganizationRepository */
    private $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepo)
    {
        $this->organizationRepository = $organizationRepo;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param OrganizationDataTable $organizationDataTable
     * @return Response
     */
    public function index(OrganizationDataTable $organizationDataTable)
    {
        return $organizationDataTable->render('organizations.index');
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        return view('organizations.create');
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationRequest $request)
    {
        $input = $request->all();

        $organization = $this->organizationRepository->create($input);

        Flash::success('Organization saved successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Display the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('organizations.show')->with('organization', $organization);
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        return view('organizations.edit')->with('organization', $organization);
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param  int              $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationRequest $request)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $organization = $this->organizationRepository->update($request->all(), $id);

        Flash::success('Organization updated successfully.');

        return redirect(route('organizations.index'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $organization = $this->organizationRepository->findWithoutFail($id);

        if (empty($organization)) {
            Flash::error('Organization not found');

            return redirect(route('organizations.index'));
        }

        $this->organizationRepository->delete($id);

        Flash::success('Organization deleted successfully.');

        return redirect(route('organizations.index'));
    }
}
