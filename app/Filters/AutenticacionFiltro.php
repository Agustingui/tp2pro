<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AutenticacionFiltro implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Si NO hay un idUsuario guardado en la sesión...
        if (! session()->get('idUsuario')) {

            // Si la petición vino por AJAX, respondemos con JSON
            if ($request->isAJAX()) {
                return service('response')
                    ->setStatusCode(401)
                    ->setJSON(['ok' => false, 'mensaje' => 'Tu sesión expiró. Volvé a ingresar.']);
            }

            // Si es una petición normal, redirigimos al login
            return redirect()->to(base_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
