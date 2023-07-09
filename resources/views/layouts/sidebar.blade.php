<style>
    #sidebar-menu>ul>li>a>span{
        font-weight: 500;
    }
</style>

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ route('dahsboard') }}">
                <i class="fe-airplay"></i>
                <span> Dashboard </span>
            </a>
        </li>

        {{-- <li>
            <a href="javascript: void(0);">
                <i class="icon-user"></i>
                <span>  Manage User </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('user.index') }}">User</a></li>
            </ul>
        </li> --}}

        <li>
            <a href="{{ route('user.index') }}">
                <i class="fe-user"></i>
                <span> User </span>
            </a>
        </li>

        <li>
            <a href="{{ route('kir.index') }}">
                <i class="fe-truck "></i>
                <span> KIR </span>
            </a>
        </li>

        <li>
            <a href="{{ route('general-setting.index') }}">
                <i class="fe-settings"></i>
                <span> General Setting </span>
            </a>
        </li>

        {{-- <li>
            <a href="javascript: void(0);">
                <i class="icon-grid"></i>
                <span>  HRIS </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('employee.index') }}">Daftar Pegawai</a></li>
                <li><a href="{{ route('employee.create') }}">Tambah Data Pegawai</a></li>
                <li><a href="{{ route('employee.import') }}">  Upload Data Pegawai</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-user"></i>
                <span> Rekrutmen </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('request-labor.index') }}">  Permintaan Tenaga Kerja </a></li>
                <li><a href="{{ route('candidate-employee.index') }}">  Data Calon Pegawai </a></li>
                <li><a href="{{ route('interview.index')}}">  Proses Wawancara </a></li>
                <li><a href="page-recoverpw.html">  Proses Permintaan Tenaga Kerja </a></li>
                <li><a href="page-lock-screen.html">  Hasilkan Nomor Induk Pegawai</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i class="icon-shuffle"></i>
                <span> Operation</span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('ticketing.index') }}"> Tiket </a></li>
                <li><a href="{{ route('schema.index') }}"> Schema </a></li>
                <li><a href="{{ route('task.index') }}"> Task </a></li>
                <li><a href="{{ route('task-score.index') }}">Task Score</a></li>
                <li><a href="{{ route('task-approver.index') }}"> Task Approver</a></li>
                <li><a href="{{ route('task-approval.index') }}"> Task Approval</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-list"></i>
                <span>  Transaksi </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('erequest.index') }}">Pengajuan Peralatan</a></li>
                <li><a href="{{ route('request-attendance.index') }}">  Pengajuan Absensi</a></li>
                <li><a href="{{ route('request-leave.index') }}">  Pengajuan Cuti </a></li>
                <li><a href="{{ route('request-permit.index') }}">  Pengajuan Izin </a></li>
                <li><a href="{{ route('request-claim.index') }}">  Pengajuan Reimburse </a></li>
                <li><a href="{{ route('request-overtime.index') }}">  Pengajuan Lembur </a></li>
                <li><a href="{{ route('request-dinas.index') }}">  Pengajuan Dinas </a></li>
                <li><a href="{{ route('request-warningletter.index') }}">  Pengajuan Surat Peringatan </a></li>
                <li><a href="{{ route('employee-status-change.index') }}">  Perubahan Status Pegawai </a></li>
                <li><a href="{{ route('request-resign.index') }}">  Pengajuan Pengunduran Diri </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-wallet"></i>
                <span>   Remunerasi </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('employee-salary.index') }}">  Daftar Gaji Pegawai </a></li>
                <li><a href="{{ route('employee-other-income.index') }}">  Pendapatan Tambahan Pegawai </a></li>
                <li><a href="{{ route('employee-discount.index') }}">  Potongan Tambahan Pegawai </a></li>
                <li><a href="{{ route('process-payroll.index') }}">  Proses Payroll </a></li>
                <li><a href="{{ route('process-pph21.index') }}">  Proses PPH21 </a></li>
                <li><a href="{{ route('process-bpjs.index') }}">  Proses BPJS </a></li>
                <li><a href="{{ route('process-thr.index') }}">  Proses THR </a></li>
                <li><a href="{{ route('process-bonus.index') }}">  Proses Bonus </a></li>
            </ul>
        </li>

        <li class="menu-title">Components</li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-notebook"></i>
                <span>  Pembelajaran</span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('history-elearning.index') }}">  Riwayat Pembelajaran </a></li>
                <li><a href="{{ route('employee-learning.index') }}">  Pantau Pembelajaran Pegawai </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-flag"></i>
                <span>  Kunjungan</span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('submission-employeevisit.index')}}">  Pengajuan Kunjungan </a></li>
                <li><a href="{{ route('visit-location.index') }}">  Daftar Lokasi Kunjungan </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-flag"></i>
                <span>  Schedule </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('employee-schedule.index') }}">Jadwal Pegawai</a></li>
                <li><a href="{{ route('employee-schedule-changes.index') }}">Tukar Jadwal</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-book-open"></i>
                <span>   Monitoring </span>
                <span class="menu-arrow"></span>
            </a>

            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{route('leave-balance.index')}}">  Monitoring Saldo Cuti </a></li>
                <li><a href="{{route('claim-balance.index')}}">  Monitoring Saldo Klaim </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-shuffle"></i>
                <span>  Approval </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="#">  Persetujuan Tertunda </a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="icon-disc"></i>
                <span>  Laporan </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('report-attendance.index') }}">  Absensi Karyawan</a></li>
                <li><a href="{{ route('report-leave.index') }}">  Cuti Karyawan </a></li>
                <li><a href="{{ route('report-permit.index') }}">  Izin Karyawan </a></li>
                <li><a href="{{ route('report-claim.index') }}">  Klaim Karyawan </a></li>
                <li><a href="{{ route('report-warningletter.index') }}">  Surat Peringatan Karyawan </a></li>
                <li><a href="{{ route('report-employee-status-change.index') }}">  Perubahan Status Pegawai </a></li>
                <li><a href="{{ route('report-resign.index') }}">  Pengajuan Pengunduran Diri </a></li>
                <li><a href="{{ route('report-equipment.index') }}">  Equipment </a></li>
                <li><a href="{{ route('report-task.index') }}">  Task </a></li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);">
                <i class="icon-settings"></i>
                <span>  Master Data </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('information.index') }}">  Information </a></li>
                <li><a href="{{ route('province.index')}}">  Provinsi </a></li>
                <li><a href="{{ route('city.index')}}">  Kota </a></li>
                <li><a href="{{ route('branch.index')}}">  Cabang </a></li>
                <li><a href="{{ route('job-level.index')}}">  Level Pekerjaan</a> </a></li>
                <li><a href="{{ route('promo.index')}}">  Promo </a></li>
                <li><a href="{{ route('allowance-type.index')}}">  Jenis Tunjangan </a></li>
                <li><a href="{{ route('payroll-type.index')}}">  Jenis Penggajian </a></li>
                <li><a href="{{ route('income-type.index')}}">  Jenis Pendapatan </a></li>
                <li><a href="{{ route('cut-type.index')}}">  Jenis Potongan </a></li>
                <li><a href="{{ route('loan-formula.index')}}">  Rumus Pinjaman </a></li>
                <li><a href="{{ route('warehouse.index')}}">  Gudang </a></li>
                <li><a href="{{ route('equipment-type.index')}}">  Tipe Peralatan </a></li>
                <li><a href="{{ route('equipment-area.index')}}">  Area Peralatan </a></li>
                <li><a href="{{ route('area.index')}}">  Area </a></li>
                <li><a href="{{ route('working-area.index')}}">  Sub Area </a></li>
                <li><a href="{{ route('equipment.index') }}">Peralatan</a></li>
                <li><a href="{{ route('announcement.index')}}">  Pengumuman </a></li>
                <li><a href="{{ route('shift.index')}}">  Shift </a></li>
                <li><a href="{{ route('bank.index')}}">  Bank </a></li>
                <li><a href="{{ route('division.index')}}">  Divisi </a></li>
                <li><a href="{{ route('department.index')}}">  Departemen </a></li>
                <li><a href="{{ route('company.index')}}">  Perusahaan </a></li>
                <li><a href="{{ route('position.index')}}">  Position </a></li>
                <li><a href="{{ route('group.index')}}">  Group </a></li>
                <li><a href="{{ route('module.index')}}">  Modul </a></li>
                <li><a href="{{ route('feature.index')}}">  Fitur </a></li>
                <li><a href="{{ route('client-feature.index')}}">  Fitur Klien </a></li>
                <li><a href="{{ route('client-module.index')}}">  Modul Klien </a></li>
                <li><a href="{{ route('client-contract.index')}}">  Kontrak Klien </a></li>
                <li><a href="{{ route('billing.index')}}">  Penagihan </a></li>
                <li><a href="{{ route('bank-account.index')}}">  Akun Bank </a></li>
                <li><a href="{{ route('payment.index')}}">  Pembayaran </a></li>
                <li><a href="{{ route('source.index')}}">  Sumber </a></li>
                <li><a href="{{ route('interview-to.index')}}">  Master Proses Wawancara </a></li>
                <li><a href="{{ route('working-hours.index')}}">  Master Jam Kerja </a></li>
                <li><a href="{{ route('master-holiday.index')}}">  Master Hari Libur</a></li>
                <li><a href="{{ route('payroll-setting.index')}}">  Pengaturan Payroll</a></li>
                <li><a href="{{ route('pkp-setting.index')}}">  Pengaturan PKP</a></li>
                <li><a href="{{ route('ptkp-setting.index')}}">  Pengaturan PTKP</a></li>
                <li><a href="{{ route('accurate-setting.index')}}">  Pengaturan Accurate</a></li>
            </ul>
        </li> --}}
    </ul>
</div>
<!-- End Sidebar -->
