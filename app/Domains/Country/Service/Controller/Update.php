<?php declare(strict_types=1);

namespace App\Domains\Country\Service\Controller;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Domains\Country\Model\Country as Model;

class Update extends ControllerAbstract
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Contracts\Auth\Authenticatable $auth
     * @param \App\Domains\Country\Model\Country $row
     *
     * @return self
     */
    public function __construct(protected Request $request, protected Authenticatable $auth, protected Model $row)
    {
        $this->request();
    }

    /**
     * @return void
     */
    protected function request()
    {
        $this->requestMergeWithRow(data: ['alias' => $this->requestAlias()]);
    }

    /**
     * @return string
     */
    protected function requestAlias(): string
    {
        return $this->request->input('alias')
            ?: implode(',', $this->row->alias ?? []);
    }

    /**
     * @return array
     */
    public function data(): array
    {
        return [
            'row' => $this->row,
        ];
    }
}