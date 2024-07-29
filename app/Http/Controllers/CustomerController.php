<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCustomersRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        return $this->getUsers(
            null,
            [
                'name' => '',
                'cpf' => '',
                'born_date' => '',
                'city' => '',
                'state' => '',
            ]
        );
    }

    public function store(StoreUpdateCustomersRequest $request)
    {
        $data = $request->validated();

        $customer = Customer::create($data);

        return $customer;
    }

    public function update(StoreUpdateCustomersRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        $data = $request->validated();
        $customer->update($data);

        $updatedCustomer = $this->getUsers(
            $id,
            [
                'name' => '',
                'cpf' => '',
                'born_date' => '',
                'city' => '',
                'state' => '',
            ]
        );
        return $updatedCustomer;
    }

    public function destroy(string $id)
    {
        Customer::findOrFail($id)->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function search(Request $params)
    {
        $refinedParams = $params->all();
        $refinedParams['name'] = $refinedParams['name'] ? $refinedParams['name'] : '';
        $refinedParams['cpf'] = !empty($refinedParams['cpf']) ? $refinedParams['cpf'] : '';
        $refinedParams['city'] = !empty($refinedParams['city']) ? $refinedParams['city'] : '';
        $refinedParams['state'] = !empty($refinedParams['state']) ? $refinedParams['state'] : '';
        $refinedParams['born_date'] = !empty($refinedParams['age']) ? $this->getBornDateByAge($refinedParams['age']) : '';
        return $this->getUsers(null, $refinedParams);
    }

    /**
     * This function is responsible to get user, is possible filter by
     * some params like id, name, cpf, born date, city and state
     *
     * @param string|null $id
     * @param object|null $params
     */
    private function getUsers(string $id = null, array $params = null)
    {
        $customers = Customer::select(
            'customer.id',
            'customer.cpf',
            'customer.name',
            DB::raw("DATE_FORMAT(customer.born_date, '%d/%m/%Y') as born_date"),
            DB::raw('TIMESTAMPDIFF(YEAR, customer.born_date, CURDATE()) AS age'),
            'customer.contact',
            'state.acronym as state_acronym',
            'city.name as city_name',
        )
            ->leftJoin('city', 'customer.city_id', '=', 'city.id') // ther order is important
            ->leftJoin('state', 'city.state_id', '=', 'state.id')
            ->when($id, function ($query, $customerId) {
                return $query->where('customer.id', $customerId);
            })
            ->when($params['name'], function ($query, $customerName) {
                return $query->orWhere('customer.name', 'like', "%{$customerName}%");
            })
            ->when($params['cpf'], function ($query, $customerCpf) {
                return $query->orWhere('customer.cpf', 'like', "%{$customerCpf}%");
            })
            ->when($params['born_date'], function ($query, $customerBornDate) {
                return $query->orWhere('customer.born_date', $customerBornDate);
            })
            ->when($params['city'], function ($query, $cityName) {
                return $query->orWhere('city.name', 'like',  "%{$cityName}%");
            })
            ->when($params['state'], function ($query, $stateAcronym) {
                return $query->orWhere('state.acronym', $stateAcronym);
            })
            ->get();

        return $customers;
    }

    private function getBornDateByAge($age)
    {
        $date = date('Y-m-d', strtotime(date('Y-m-d') . " -{$age} years"));
        return $date;
    }
}
