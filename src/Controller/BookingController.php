<?php

namespace App\Controller;

use App\Domain\Service\BookingService;
use App\Response\ApiHttpBadRequestResponse;
use App\Response\ApiHttpCreatedResponse;
use App\Response\ApiHttpResponse;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/api", name="api_")
 */
class BookingController extends AbstractFOSRestController
{
    /**
     * @var BookingService
     */
    private $bookingService;

    /**
     * @param BookingService $bookingService
     */
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * @Rest\Post("/booking")
     *
     * @param Request $request
     * @return ApiHttpResponse
     */
    public function postBookingAction(Request $request) : ApiHttpResponse
    {
        try {
            $this->bookingService->create($request->request->all());
        } catch (\Exception $bookingCreationException) {
            return new ApiHttpBadRequestResponse();
        }

        return new ApiHttpCreatedResponse();
    }
}