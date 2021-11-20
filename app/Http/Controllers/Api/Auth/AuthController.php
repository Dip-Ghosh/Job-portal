<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormValidationRequest;
use App\Http\Requests\RegisterFormValidationRequest;
use App\Http\Resources\UserResource;
use App\Http\Response\ResponseRepository;
use App\Repository\Api\LoginRegistrationInterface;
use App\Service\LoginRegistrationService;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class AuthController extends Controller
{

    protected $loginRegistration;
    protected $loginRegistrationService;
    protected $responseRepository;

    public function __construct(LoginRegistrationInterface $loginRegistration,LoginRegistrationService $loginRegistrationService,ResponseRepository $responseRepository)
    {
        $this->loginRegistration = $loginRegistration;
        $this->loginRegistrationService = $loginRegistrationService;
        $this->responseRepository = $responseRepository;
    }

    /**
     * @param RegisterFormValidationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterFormValidationRequest $request){

        try{
            $user = $this->loginRegistrationService->saveUser($request->all());
            $data['user'] =  new UserResource($user);
            $data['token'] =  $user->createToken('auth_token')->accessToken;
            return $this->responseRepository->ResponseSuccess($data,"User register successfully", ResponseAlias::HTTP_CREATED);

        }catch (\Exception $e){
            return $this->responseRepository->ResponseError($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    /**
     * @param LoginFormValidationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginFormValidationRequest $request)
    {
        if (!Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
            return $this->responseRepository->ResponseError("Invalid Email or Password",ResponseAlias::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $data['token'] = $user->createToken('auth_token')->accessToken;
        return $this->responseRepository->ResponseSuccess($data,"Login successfully",ResponseAlias::HTTP_OK);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try{
            Auth::user()->token()->revoke();
            return $this->responseRepository->ResponseSuccess(null,"Logout successfully",ResponseAlias::HTTP_OK);
        }catch (\Exception $e){
            return $this->responseRepository->ResponseError($e->getMessage(), ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



}
