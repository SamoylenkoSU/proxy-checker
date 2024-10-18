<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller;

use App\Application\CreateReport\CreateReportAction;
use App\Application\CreateReport\Dto\CreateReportRequest;
use App\Application\ReportInfo\Dto\ReportInfoRequest;
use App\Application\ReportInfo\ReportInfoProvider;
use App\Application\ReportList\ReportListProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ReportController extends AbstractController
{
    public function __construct(
        private ReportInfoProvider $reportInfoProvider,
        private ReportListProvider $reportListProvider,
        private UrlGeneratorInterface $urlGenerator,
        private CreateReportAction $createReportAction,
    ) {
    }

    #[Route('/', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('main.html.twig', [
            'reports' => $this->reportListProvider->getList(),
        ]);
    }

    #[Route('/report/{id}', 'report_info', methods: ['GET'])]
    public function info(int $id): Response
    {
        $report = $this->reportInfoProvider->getReport(new ReportInfoRequest($id));

        return $this->render('report.html.twig', [
            'report' => $report,
        ]);
    }

    #[Route('/report', methods: ['POST'])]
    public function create(Request $request): Response
    {
        $proxies = $request->request->get('proxies', '');

        $response = $this->createReportAction->create(new CreateReportRequest(
            explode(PHP_EOL, str_replace(["\r\n", "\r"], PHP_EOL, $proxies)),
        ));

        return $this->redirect(
            $this->urlGenerator->generate('report_info', [
                'id' => $response->reportId,
            ]),
        );
    }
}
