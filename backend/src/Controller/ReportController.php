<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ProxyCheckReport\ProxyReportCreator;
use App\Service\ProxyCheckReport\ProxyReportProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ReportController extends AbstractController
{
    public function __construct(
        private ProxyReportCreator $reportCreator,
        private ProxyReportProvider $reportProvider,
        private UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function index(): Response
    {
        return $this->render('main.html.twig', [
            'reports' => $this->reportProvider->getList(),
        ]);
    }

    public function info(int $id): Response
    {
        $report = $this->reportProvider->getReport($id);

        return $this->render('report.html.twig', [
            'report' => $report,
        ]);
    }

    public function create(Request $request): Response
    {
        $proxies = $request->request->get('proxies', '');

        $report = $this->reportCreator->create(explode(PHP_EOL, str_replace(["\r\n", "\r"], PHP_EOL, $proxies)));

        return $this->redirect(
            $this->urlGenerator->generate('report_info', [
                'id' => $report->getId(),
            ]),
        );
    }
}
